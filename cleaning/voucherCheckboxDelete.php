<?php
require_once "config.php"; 

//delete.php
if(isset($_POST["id"]))
{
    foreach($_POST["id"] as $id)
    {
        $query = "DELETE FROM voucher WHERE voucher_id = '".$id."'";
        mysqli_query($link, $query);
    } 
}
?>