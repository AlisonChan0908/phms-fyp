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
$pa_bg_date = mysqli_real_escape_string($link, $_REQUEST['pa_bg_date']);
$pa_bg_time = mysqli_real_escape_string($link, $_REQUEST['pa_bg_time']);
$pa_sugarc = mysqli_real_escape_string($link, $_REQUEST['pa_sugarc']);
$pa_measuredt = mysqli_real_escape_string($link, $_REQUEST['pa_measuredt']);
$pa_diabetic = mysqli_real_escape_string($link, $_REQUEST['pa_diabetic']);

//Check if values ia already in the database
$sql = "SELECT * FROM patient_bg WHERE pa_id='$pa_id' AND pa_bg_date='$pa_bg_date' AND pa_bg_time='$pa_bg_time' AND pa_diabetic='$pa_diabetic'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

 
        echo '<div class="alert">
                        
<strong> Record already exists. <strong> </br></br> <a href="add_latest_bloodglucose_form.php">Back to add blood glucose.</a>
 </div>';
    }
//If it does not exist, then insert it

    else 
    {


// Attempt insert query execution
$sql = "INSERT INTO patient_bg (pa_id, pa_bg_date, pa_bg_time, pa_sugarc, pa_measuredt, pa_diabetic) VALUES ('$pa_id', '$pa_bg_date', '$pa_bg_time', '$pa_sugarc','$pa_measuredt', '$pa_diabetic')";
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