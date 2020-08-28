<?php
include_once("../../includes/db.php");
$select = "DELETE from basic_imaging where id='".$_GET['del_id']."'";
$query = mysqli_query($con, $select) or die($select);
header ("Location: basic_imaging.php");
?>