<?php
include_once("../../includes/db.php");
$select = "DELETE from ir_imaging where id='".$_GET['del_id']."'";
$query = mysqli_query($con, $select) or die($select);
header ("Location: ir_imaging.php");
?>