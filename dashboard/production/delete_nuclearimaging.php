<?php
include_once("../../includes/db.php");
$select = "DELETE from nuclear_imaging where id='".$_GET['del_id']."'";
$query = mysqli_query($con, $select) or die($select);
header ("Location: nuclear_imaging.php");
?>