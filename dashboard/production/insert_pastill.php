<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "taro");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();
 
// Escape user inputs for security
$pa_id = $_SESSION['pa_id'];
$illness_name = mysqli_real_escape_string($link, $_REQUEST['illness_name']);
$illness_duration = mysqli_real_escape_string($link, $_REQUEST['illness_duration']);
$illness_fo = mysqli_real_escape_string($link, $_REQUEST['illness_fo']);


//Check if values ia already in the database
$sql = "SELECT * FROM patient_past_illnesses WHERE pa_id='$pa_id' AND illness_name='$illness_name' AND illness_fo='$illness_fo'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

        echo 'Record already exists. </br> <a href="add_pastill_form.php">Back to add past illness record</a>';
        
    }
//If it does not exist, then insert it

    else 
    {

// Attempt insert query execution
$sql = "INSERT INTO patient_past_illnesses (pa_id, illness_name, illness_duration, illness_fo) VALUES ('$pa_id', '$illness_name', '$illness_duration', '$illness_fo')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:pastill.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>



