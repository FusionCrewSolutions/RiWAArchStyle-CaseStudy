<?php
include_once($_SERVER['DOCUMENT_ROOT']."/00Experiments/RiWAArch Case studies/RiWAArch Case study/Model/config.php");

class Item
{
   //READ--------------------------------------   
   public function getItems()
   {
      global $con;
      $itemsGrid="";    
           
      try
      {
         $sql = "SELECT * FROM item";

         if ($result = mysqli_query($con,$sql))
         {
            if(mysqli_num_rows($result)==0)
            {
               $itemsGrid = "There are no items.";
            }
            else
            {
            
               $itemsGrid="<table border='1' cellspacing='1' cellpadding='1'><tr><th>ItemNo</th><th>Name</th><th>Description</th><th>Edit</th><th>Delete</th></tr>";
                 
                 
               while($row = mysqli_fetch_row($result))
               {
                  $itemsGrid.="<tr>
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                     <td><input name=\"btnEdit\" type=\"button\" 
                           id=\"btnEdit\" value=\"Edit\" data-itemid=\"$row[0]\"></td>
                     <td><input name=\"btnRemove\" type=\"button\" 
                           id=\"btnRemove\" value=\"Remove\" data-itemid=\"$row[0]\"></td>
                    </tr>";
                           
               }//END OF WHILE   
               
               $itemsGrid.="</table>"; 
            }
         }//END of IF
         else
         {
            $itemsGrid = "Error while reading items";
         }
      }
      catch(Exception $e)
      {
         $itemsGrid = "Error: ".$e->getMessage();
      }  
         
      return $itemsGrid;      
   }
   

   //CREATE--------------------------------------------------------------------
   public function saveItem($itemName,$itemDesc)
   {
      global $con;
   
      try
      {     
         $sql="INSERT INTO item VALUES (0, '$itemName', '$itemDesc');"; 
         mysqli_query($con,$sql) or die("Error while saving");
      }
      catch(Exception $e)
      {
         return "Error: ".$e->getMessage();
      }  
      
      return $this->getItems();
   }
   

   //UPDATE--------------------------------------------------------------------
   public function updateItem($itemNum, $itemName, $itemDesc)
   {
      global $con;
   
      try
      {
         $sql="UPDATE item SET itemName='$itemName',itemDescription='$itemDesc' WHERE itemNumber=$itemNum";
         mysqli_query($con,$sql) or die("Error while updating");        
      }
      catch(Exception $e)
      {
         return "Error: ".$e->getMessage();
      }
      
      return $this->getItems();
   }
   

   //DELETE----------------------------------------------------------------------
   public function removeItem($itemID)
   {
      global $con;
   
      try
      {     
         $sql="DELETE FROM item WHERE itemNumber=$itemID";  
         mysqli_query($con,$sql) or die("Error while removing");        
      }
      catch(Exception $e)
      {
         return "Error: ".$e->getMessage();
      }
      
      return $this->getItems();
   }  
}
?>