<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("us-cdbr-east-02.cleardb.com", "baf5ca15029df6", "8111c740", "heroku_79fc0f987d687d0");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();
 
// Escape user inputs for security
$pa_id = $_SESSION['pa_id'];
$pa_bp_date = mysqli_real_escape_string($link, $_REQUEST['pa_bp_date']);
$pa_bp_time = mysqli_real_escape_string($link, $_REQUEST['pa_bp_time']);
$pa_systolic = mysqli_real_escape_string($link, $_REQUEST['pa_systolic']);
$pa_diastolic = mysqli_real_escape_string($link, $_REQUEST['pa_diastolic']);
$pa_pulse = mysqli_real_escape_string($link, $_REQUEST['pa_pulse']);
$pa_irreh = mysqli_real_escape_string($link, $_REQUEST['pa_irreh']);


//Check if values ia already in the database
$sql = "SELECT * FROM patient_bp WHERE pa_id='$pa_id' AND pa_bp_date='$pa_bp_date' AND pa_bp_time='$pa_bp_time'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

        echo 'Record already exists. </br> <a href="add_latest_bloodpressure_form.php">Back to add blood pressure</a>';
        
    }
//If it does not exist, then insert it

    else 
    {

// Attempt insert query execution
$sql = "INSERT INTO patient_bp (pa_id, pa_bp_date, pa_bp_time, pa_systolic, pa_diastolic, pa_pulse, pa_irreh) VALUES ('$pa_id','$pa_bp_date', '$pa_bp_time', '$pa_systolic','$pa_diastolic','$pa_pulse','$pa_irreh')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:measurements.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>