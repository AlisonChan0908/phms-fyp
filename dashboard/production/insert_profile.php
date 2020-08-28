<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("us-cdbr-east-02.cleardb.com", "baf5ca15029df6", "8111c740", "heroku_79fc0f987d687d0");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = $_SESSION['username'];
$pa_firstname = mysqli_real_escape_string($link, $_REQUEST['pa_firstname']);
$pa_lastname = mysqli_real_escape_string($link, $_REQUEST['pa_lastname']);
$pa_dob = mysqli_real_escape_string($link, $_REQUEST['pa_dob']);
$pa_gender = mysqli_real_escape_string($link, $_REQUEST['pa_gender']);
$pa_maritalstatus = mysqli_real_escape_string($link, $_REQUEST['pa_maritalstatus']);
$pa_children = mysqli_real_escape_string($link, $_REQUEST['pa_children']);
$pa_phone = mysqli_real_escape_string($link, $_REQUEST['pa_phone']);
$pa_address = mysqli_real_escape_string($link, $_REQUEST['pa_address']);
$pa_city = mysqli_real_escape_string($link, $_REQUEST['pa_city']);
$pa_state = mysqli_real_escape_string($link, $_REQUEST['pa_state']);
$pa_zipcode = mysqli_real_escape_string($link, $_REQUEST['pa_zipcode']);
$pa_country = mysqli_real_escape_string($link, $_REQUEST['pa_country']);
$pa_race = mysqli_real_escape_string($link, $_REQUEST['pa_race']);
$pa_current_occupation = mysqli_real_escape_string($link, $_REQUEST['pa_current_occupation']);


 
// Attempt update query execution
$sql = "UPDATE users
SET pa_firstname='$pa_firstname', pa_lastname='$pa_lastname', pa_dob='$pa_dob', pa_gender='$pa_gender', pa_maritalstatus='$pa_maritalstatus', pa_children='$pa_children', pa_phone='$pa_phone', pa_address='$pa_address', pa_city='$pa_city', pa_state='$pa_state', pa_zipcode='$pa_zipcode', pa_country='$pa_country', pa_race='$pa_race', pa_current_occupation='$pa_current_occupation'
WHERE username='$username'";
if(mysqli_query($link, $sql)){

    echo "Records updated successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:personal_profile.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

