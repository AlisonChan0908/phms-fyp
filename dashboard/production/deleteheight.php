<?php
include_once("../../includes/db.php");
$select = "DELETE from patient_height where id='".$_GET['del_id']."'";
$query = mysqli_query($con, $select) or die($select);
header ("Location: edit_heightpage.php");
?>