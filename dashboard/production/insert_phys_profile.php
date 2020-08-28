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
$userid = $_SESSION['userid'];
$phys_fullname = mysqli_real_escape_string($link, $_REQUEST['phys_fullname']);
$phys_email = mysqli_real_escape_string($link, $_REQUEST['phys_email']);
$phys_phone = mysqli_real_escape_string($link, $_REQUEST['phys_phone']);
$phys_hospitalname = mysqli_real_escape_string($link, $_REQUEST['phys_hospitalname']);
$phys_specialty = mysqli_real_escape_string($link, $_REQUEST['phys_specialty']);
$phys_qualifications = mysqli_real_escape_string($link, $_REQUEST['phys_qualifications']);
$phys_med_reg_no = mysqli_real_escape_string($link, $_REQUEST['phys_med_reg_no']);
$phys_nspe_reg_no = mysqli_real_escape_string($link, $_REQUEST['phys_nspe_reg_no']);




 
// Attempt update query execution
$sql = "UPDATE physician
SET phys_fullname='$phys_fullname', phys_email='$phys_email', phys_phone='$phys_phone', phys_hospitalname='$phys_hospitalname', phys_specialty='$phys_specialty', phys_qualifications='$phys_qualifications', phys_med_reg_no='$phys_med_reg_no', phys_nspe_reg_no='$phys_nspe_reg_no'
WHERE userid='$userid'";
if(mysqli_query($link, $sql)){

    echo "Records updated successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:myDetails.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

