<?php
session_start();

//User verifictaion
include("Model/User.php");      
$usrObj = new User();   
$usrObj->isLoggedUser();


//Items management   
include("Model/Item.php");
$itemObj = new item();
$itemsTable = $itemObj->getItems();
?>


<!doctype html>
<html>

<head>
<title>Items</title>
<script src="Controllers/jQuery.js" type="text/javascript"></script>
<script src="Controllers/controllerMain.js" type="text/javascript"></script>
<style>
html, body
{
   font-family: tahoma;
   font-size:12px;
   margin:0px;
   padding:0px;
}
header
{
   background-color:#66A7EE;
   padding:5px;
}
label
{
   width:100px;
   display:inline-block;
   margin:2px;
}

input[type="text"], input[type="password"]
{
   width:150px;
   margin:2px;
}

#formItems
{
   border:solid 1px #000000;
   padding:10px;
   width:500px;
   margin: 0 auto;
}

table 
{
    border-collapse: collapse;
    margin:0 auto;
}

table, th, td 
{
    border: 1px solid black;
    padding: 5px;
    text-align: left;
}
</style>
</head>

<body>
<header>
   <input id="btnLogout" name="btnLogout" type="button" value="Logout">
</header>
<br>
<form id="formItems">
<h1>Items</h1>
   <input id="hidItemID" name="hidItemID" type="hidden" value="0">
   <label>Item Name</label><input id="txtItemName" name="txtItemName" type="text"> <br>
   <label>Item Description</label><input id="txtItemDesc" name="txtItemDesc" type="text"> <br>
   
   <input id="btnSave" name="btnSave" type="button" value="Save"> 
   <input id="btnRefresh" name="btnRefresh" type="button" value="Refresh"> <br>
   <div id="divStsMsgItem"></div><br>
   <div id="divItemsTable"><?php echo $itemsTable; ?></div>
</form>


</body>

</html>