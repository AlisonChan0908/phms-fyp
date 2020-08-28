<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "taro");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = $_SESSION['username'];
$pec_firstname = mysqli_real_escape_string($link, $_REQUEST['pec_firstname']);
$pec_lastname = mysqli_real_escape_string($link, $_REQUEST['pec_lastname']);
$pec_relationship = mysqli_real_escape_string($link, $_REQUEST['pec_relationship']);
$pec_house_no = mysqli_real_escape_string($link, $_REQUEST['pec_house_no']);
$pec_phone_no = mysqli_real_escape_string($link, $_REQUEST['pec_phone_no']);
$sec_firstname = mysqli_real_escape_string($link, $_REQUEST['sec_firstname']);
$sec_lastname = mysqli_real_escape_string($link, $_REQUEST['sec_lastname']);
$sec_relationship = mysqli_real_escape_string($link, $_REQUEST['sec_relationship']);
$sec_house_no = mysqli_real_escape_string($link, $_REQUEST['sec_house_no']);
$sec_phone_no = mysqli_real_escape_string($link, $_REQUEST['sec_phone_no']);

 
// Attempt update query execution
$sql = "UPDATE users
SET pec_firstname='$pec_firstname', pec_lastname='$pec_lastname', pec_relationship='$pec_relationship', pec_house_no='$pec_house_no', pec_phone_no='$pec_phone_no',
sec_firstname='$sec_firstname', sec_lastname='$sec_lastname', sec_relationship='$sec_relationship', sec_house_no='$sec_house_no', sec_phone_no='$sec_phone_no'
WHERE username='$username'";
if(mysqli_query($link, $sql)){

    echo "Records updated successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:emergency_profile.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>