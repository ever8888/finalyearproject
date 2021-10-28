<?php
require_once "config.php"; 

//delete.php
if(isset($_POST["id"]))
{
    foreach($_POST["id"] as $id)
    {
        $query = "DELETE FROM worker WHERE worker_id = '".$id."'";
        mysqli_query($link, $query);
    } 
}
?>