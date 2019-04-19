var DCBusIndex = "Model/index.php";

//==CONTROLLER=======================================================================================
//--User----------------------------------------------------------
//--Login--
$(document).on("click","#btnLogin",function() 
{
   $("#divStsMsgLogin").html("");
   var result = isValidFormLogin();//use client-Model
   
   if(result=="true")//use DC engine
   {  userLogIn();   }
   else
   {  $("#divStsMsgLogin").html(result);  }
});

//--Logout--
$(document).on("click","#btnLogout", function()
{  userLogOut();  });//use DC engine


//--Items-----------------------------------------------------
//--Refresh--
$(document).on("click","#btnRefresh", function()
{
   itemRead();//use DC engine
});

//--Save--
$(document).on("click","#btnSave", function()
{
   var result = isValidFormItem();//use client-Model
   
   if(result == "true")//use DC engine
   {  itemSaveUpdate(); }
   else
   {  $("#divStsMsgItem").html(result);   }
});

//--Edit--
$(document).on("click", "#btnEdit", function()
{
   $("#hidItemID").val($(this).data("itemid"));
   $("#txtItemName").val($(this).closest("tr").find('td:eq(1)').text());
   $("#txtItemDesc").val($(this).closest("tr").find('td:eq(2)').text());
});

//--Delete--
$(document).on("click", "#btnRemove", function()
{  itemDelete($(this).data("itemid")); });//use DC engine






//==CLIENT-MODEL====================================================================================
//--User------------------------------------------------
function isValidFormLogin()
{
   if($.trim($("#txtUserName").val())=="")
   {  return "Enter Username";   }
   
   if($.trim($("#txtPassword").val())=="")
   {  return "Enter Password";   }
   
   return "true";
}

//--Item------------------------------------------------
function isValidFormItem()
{
   if($.trim($("#txtItemName").val())=="")
   {  return "Enter item name";  }
   
   if($.trim($("#txtItemDesc").val())=="")
   {  return "Enter description";   }
   
   return "true";
}





//==DC ENGINE=======================================================================================
//--User--------------------------------------------
//--Login--
function userLogIn()
{
   $.ajax(
   {
      type: "post",
      url: DCBusIndex + "/user/null",
      data:$("#formLogin").serialize()
   })
   .done(function(data) 
   {        
      if(data=="true")
      {  document.location = "items.php"; }
      else
      {  $("#divStsMsgLogin").html(data); }
   })
   .fail(function() 
   {  $("#divStsMsgLogin").html("Error while authenticating"); })
}

//--Logout--
function userLogOut()
{
   $.ajax(
   {
      type: "delete",
      url: DCBusIndex + "/user/null",
   })
   .done(function() 
   {  document.location = "index.php"; })
}

//--Item---------------------------------------------------
//--Read--
function itemRead()
{
   $("#divStsMsgItem").html("Loading...");   

   $.ajax(
   {
      type: "get",
      url: DCBusIndex + "/item/null"
   })
   .done(function(data) 
   {
      $("#divItemsTable").html(data);
      $("#divStsMsgItem").html("Loaded successfully");      
   })
   .fail(function() 
   {  $("#divStsMsgItem").html("Error while loading");   })
}

//--Save/Update--
function itemSaveUpdate()
{
   $("#divStsMsgItem").html("Saving...");
   $.ajax(
   {
      type: "post",
      url: DCBusIndex + "/item/"+($("#hidItemID").val()=="0"?"null":$("#hidItemID").val()),
      data:$("#formItems").serialize()
   })
   .done(function(data) 
   {
      $("#formItems")[0].reset();
      $("#divItemsTable").html(data);     
      $("#divStsMsgItem").html("Saved successfully"); 
   })
   .fail(function() 
   {  $("#divStsMsgItem").html("Error while saving");    })
}

//--Delete--
function itemDelete(itemID)
{
   $("#divStsMsgItem").html("Removing...");  

   $.ajax(
   {
      type: "delete",
      url: DCBusIndex + "/item/"+itemID
   })
   .done(function(data) 
   {
      $("#divItemsTable").html(data);
      $("#divStsMsgItem").html("Removed successfully");     
   })
   .fail(function() 
   {  $("#divStsMsgItem").html("Error while removing");  })
}
