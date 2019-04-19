<?php
   include("Item.php"); 
   $itm = new Item();
   
   switch($_SERVER['REQUEST_METHOD'])
   {
      case "GET": echo $itm->getItems(); break;
      case "POST":
         if($_param=="null")//Save
         { 
            echo $itm->saveItem($_POST['txtItemName'],$_POST['txtItemDesc']); 
         }
         else //Update
         { 
            echo $itm->updateItem($_POST['hidItemID'],$_POST['txtItemName'],$_POST['txtItemDesc']);
         }
         break;
      case "DELETE": echo $itm->removeItem($_param); break;
   }
?>