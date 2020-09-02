
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
$child_disease_name = mysqli_real_escape_string($link, $_REQUEST['child_disease_name']);
$child_disease_startd = mysqli_real_escape_string($link, $_REQUEST['child_disease_startd']);
$child_disease_endd = mysqli_real_escape_string($link, $_REQUEST['child_disease_endd']);
$child_disease_duration = mysqli_real_escape_string($link, $_REQUEST['child_disease_duration']);

$child_disease_duration = abs($child_disease_startd - $child_disease_endd);  





//Check if values ia already in the database
$sql = "SELECT * FROM patient_child_disease WHERE pa_id='$pa_id' AND child_disease_name='$child_disease_name' AND child_disease_startd='$child_disease_startd'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

    
        echo '<div class="alert">
                        
<strong> Record already exists. <strong> </br></br> <a href="add_childd_form.php">Back to add child disease record.</a>
 </div>';
    }
//If it does not exist, then insert it

    else 
    {

// Attempt insert query execution
$sql = "INSERT INTO patient_child_disease (pa_id, child_disease_name, child_disease_startd, child_disease_endd, child_disease_duration ) VALUES ('$pa_id', '$child_disease_name', '$child_disease_startd', '$child_disease_endd', '$child_disease_duration')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:childd.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>



