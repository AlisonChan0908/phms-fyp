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
$injury_name = mysqli_real_escape_string($link, $_REQUEST['injury_name']);
$injury_start_date = mysqli_real_escape_string($link, $_REQUEST['injury_start_date']);
$injury_end_date = mysqli_real_escape_string($link, $_REQUEST['injury_end_date']);
$injury_trt_venue = mysqli_real_escape_string($link, $_REQUEST['injury_trt_venue']);
$injury_rec_duration = mysqli_real_escape_string($link, $_REQUEST['injury_rec_duration']);

$injury_rec_duration = abs($injury_start_date - $injury_end_date);  

//Check if values ia already in the database
$sql = "SELECT * FROM patient_injury WHERE pa_id='$pa_id' AND injury_name='$injury_name' AND injury_start_date='$injury_start_date'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

        echo 'Record already exists. </br> <a href="add_injury_form.php">Back to add injury record</a>';
        
    }
//If it does not exist, then insert it

    else 
    {

// Attempt insert query execution
$sql = "INSERT INTO patient_injury (pa_id, injury_name, injury_start_date, injury_end_date, injury_trt_venue, injury_rec_duration ) VALUES ('$pa_id', '$injury_name', '$injury_start_date', '$injury_end_date', '$injury_trt_venue', '$injury_rec_duration')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:injury.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>



