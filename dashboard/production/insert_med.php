

<html>
    <head>
    <style>
  
       
.alert {
  padding: 20px;
  background-color: #FFFAFA;
  color:#FA8072;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}



    </style>
    </head>
</html>
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
$pa_med_name = mysqli_real_escape_string($link, $_REQUEST['pa_med_name']);
$pa_med_unit = mysqli_real_escape_string($link, $_REQUEST['pa_med_unit']);
$pa_med_dosage = mysqli_real_escape_string($link, $_REQUEST['pa_med_dosage']);
$pa_med_freq = mysqli_real_escape_string($link, $_REQUEST['pa_med_freq']);
$pa_med_time = mysqli_real_escape_string($link, $_REQUEST['pa_med_time']);
$pa_med_routes = mysqli_real_escape_string($link, $_REQUEST['pa_med_routes']);
$pa_med_startd = mysqli_real_escape_string($link, $_REQUEST['pa_med_startd']);
$pa_med_endd = mysqli_real_escape_string($link, $_REQUEST['pa_med_endd']);
$pa_med_purpose = mysqli_real_escape_string($link, $_REQUEST['pa_med_purpose']);
$pa_med_presby = mysqli_real_escape_string($link, $_REQUEST['pa_med_presby']);
$pa_med_notes = mysqli_real_escape_string($link, $_REQUEST['pa_med_notes']);


//Check if values ia already in the database
$sql = "SELECT * FROM patient_medication WHERE pa_id='$pa_id' AND pa_med_name ='$pa_med_name' AND pa_med_startd='$pa_med_startd'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

   
        echo '<div class="alert">
                        
<strong> Record already exists. <strong> </br></br> <a href="add_med_form.php">Back to add medication record.</a>
 </div>';
    }
//If it does not exist, then insert it

    else 
    {

// Attempt insert query execution
$sql = "INSERT INTO patient_medication (pa_id, pa_med_name, pa_med_unit, pa_med_dosage, pa_med_freq, pa_med_time,pa_med_routes, pa_med_startd, pa_med_endd, pa_med_purpose, pa_med_presby, pa_med_notes) VALUES ('$pa_id', '$pa_med_name', '$pa_med_unit', '$pa_med_dosage', '$pa_med_freq', '$pa_med_routes', '$pa_med_time', '$pa_med_startd', '$pa_med_endd', '$pa_med_purpose', '$pa_med_presby', '$pa_med_notes')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:medications.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>