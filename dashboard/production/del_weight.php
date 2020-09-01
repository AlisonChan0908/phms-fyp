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
$pa_weight_date = mysqli_real_escape_string($link, $_REQUEST['pa_weight_date']);
$pa_weight_time = mysqli_real_escape_string($link, $_REQUEST['pa_weight_time']);
$pa_weight = mysqli_real_escape_string($link, $_REQUEST['pa_weight']);


// sql to delete a record
$sql = "DELETE FROM patient_weight";
 

if(mysqli_query($link, $sql)){

    echo "Records updated successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:measurements.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>