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
$pa_cho_date = mysqli_real_escape_string($link, $_REQUEST['pa_cho_date']);
$pa_cho_time = mysqli_real_escape_string($link, $_REQUEST['pa_cho_time']);
$pa_ldl = mysqli_real_escape_string($link, $_REQUEST['pa_ldl']);
$pa_hdl = mysqli_real_escape_string($link, $_REQUEST['pa_hdl']);
$pa_trigly = mysqli_real_escape_string($link, $_REQUEST['pa_trigly']);
$pa_total_cho = mysqli_real_escape_string($link, $_REQUEST['pa_total_cho']);


$percentage = 0.2;
$new_pa_trigly = ($percentage * $pa_trigly);
$pa_total_cho = $pa_ldl + $pa_hdl + $new_pa_trigly;

//Check if values ia already in the database
$sql = "SELECT * FROM patient_cholesterol WHERE pa_id='$pa_id' AND pa_cho_date='$pa_cho_date' AND pa_cho_time='$pa_cho_time'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

        echo 'Record already exists. </br> <a href="add_latest_cholesterol_form.php">Back to add cholesterol record</a>';
        
    }
//If it does not exist, then insert it

    else 
    {


// Attempt insert query execution
$sql = "INSERT INTO patient_cholesterol (pa_id, pa_cho_date, pa_cho_time, pa_ldl, pa_hdl, pa_trigly, pa_total_cho) VALUES ('$pa_id','$pa_cho_date', '$pa_cho_time', '$pa_ldl','$pa_hdl','$pa_trigly','$pa_total_cho')";
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