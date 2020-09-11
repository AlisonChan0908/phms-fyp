<?php
include_once("../../includes/db.php");
$select = "DELETE from booking where id='".$_GET['del_id']."'";
$query = mysqli_query($con, $select) or die($select);
header ("Location: phys_index.php");
?>