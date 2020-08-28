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
$pa_weight_date = mysqli_real_escape_string($link, $_REQUEST['pa_weight_date']);
$pa_weight_time = mysqli_real_escape_string($link, $_REQUEST['pa_weight_time']);
$pa_weight = mysqli_real_escape_string($link, $_REQUEST['pa_weight']);


//Check if values ia already in the database
$sql = "SELECT * FROM patient_weight WHERE pa_id='$pa_id' AND pa_weight_date='$pa_weight_date' AND pa_weight_time='$pa_weight_time'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

        echo 'Record already exists. </br> <a href="add_latest_weight_form.php">Back to add weight</a>';
        
    }
//If it does not exist, then insert it

    else 
    {





// Attempt insert query execution
$sql = "INSERT INTO patient_weight (pa_id, pa_weight_date, pa_weight_time, pa_weight) VALUES ('$pa_id', '$pa_weight_date', '$pa_weight_time', '$pa_weight')";
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