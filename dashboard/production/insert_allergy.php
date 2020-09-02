
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
$pa_allergy_name = mysqli_real_escape_string($link, $_REQUEST['pa_allergy_name']);
$pa_allergy_type = mysqli_real_escape_string($link, $_REQUEST['pa_allergy_type']);
$pa_allergy_reaction = mysqli_real_escape_string($link, $_REQUEST['pa_allergy_reaction']);
$pa_allergy_tx = mysqli_real_escape_string($link, $_REQUEST['pa_allergy_tx']);
$pa_allergy_fo = mysqli_real_escape_string($link, $_REQUEST['pa_allergy_fo']);
$pa_allergy_notes = mysqli_real_escape_string($link, $_REQUEST['pa_allergy_notes']);



//Check if values ia already in the database
$sql = "SELECT * FROM patient_allergy WHERE pa_id='$pa_id' AND pa_allergy_name='$pa_allergy_name' AND pa_allergy_fo='$pa_allergy_fo'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

echo '<div class="alert">
                        
<strong> Record already exists. <strong> </br></br> <a href="edit_allergy.php">Back to add allergy.</a>
 </div>';
        
    }
//If it does not exist, then insert it

    else 
    {





// Attempt insert query execution
$sql = "INSERT INTO patient_allergy (pa_id, pa_allergy_name, pa_allergy_type, pa_allergy_reaction, pa_allergy_tx, pa_allergy_fo, pa_allergy_notes) VALUES ('$pa_id', '$pa_allergy_name', '$pa_allergy_type', '$pa_allergy_reaction','$pa_allergy_tx','$pa_allergy_fo','$pa_allergy_notes')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:allergy.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
    }
// Close connection
mysqli_close($link);
?>



