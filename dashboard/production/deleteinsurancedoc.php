<?php
include_once("../../includes/db.php");
$select = "DELETE from insurance_doc where id='".$_GET['del_id']."'";
$query = mysqli_query($con, $select) or die($select);
header ("Location: insurance_doc.php");
?>