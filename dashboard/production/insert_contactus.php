
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
$patient_fullname = mysqli_real_escape_string($link, $_REQUEST['patient_fullname']);
$patient_email = mysqli_real_escape_string($link, $_REQUEST['patient_email']);
$patient_contactnumber = mysqli_real_escape_string($link, $_REQUEST['patient_contactnumber']);
$pa_message = mysqli_real_escape_string($link, $_REQUEST['pa_message']);




//Check if values ia already in the database
$sql = "SELECT * FROM contact_us WHERE pa_id='$pa_id' AND patient_fullname='$patient_fullname' AND patient_email='$patient_email' AND patient_contactnumber='$patient_contactnumber'
AND pa_message='$pa_message'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

      
        echo '<div class="alert">
                        
<strong> Record already exists. <strong> </br></br> <a href="contact_us.php">Back to contact us.</a>
 </div>';
    }
//If it does not exist, then insert it

    else 
    {





// Attempt insert query execution
$sql = "INSERT INTO contact_us (pa_id, patient_fullname, patient_email, patient_contactnumber, pa_message) 
VALUES ('$pa_id', '$patient_fullname', '$patient_email', '$patient_contactnumber','$pa_message')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:contactus_success.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
    }
// Close connection
mysqli_close($link);
?>



