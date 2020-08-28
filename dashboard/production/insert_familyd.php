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
$fam_disease_name = mysqli_real_escape_string($link, $_REQUEST['fam_disease_name']);
$fam_disease_startd = mysqli_real_escape_string($link, $_REQUEST['fam_disease_startd']);
$fam_disease_endd = mysqli_real_escape_string($link, $_REQUEST['fam_disease_endd']);
$fam_disease_duration = mysqli_real_escape_string($link, $_REQUEST['fam_disease_duration']);

$fam_disease_duration = abs($fam_disease_startd - $fam_disease_endd);  

 //Check if values ia already in the database
$sql = "SELECT * FROM patient_family_disease WHERE pa_id='$pa_id' AND fam_disease_name='$fam_disease_name' AND fam_disease_startd='$fam_disease_startd'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

        echo 'Record already exists. </br> <a href="add_familyd_form.php">Back to add family disease record</a>';
        
    }
//If it does not exist, then insert it

    else 
    {
// Attempt insert query execution
$sql = "INSERT INTO patient_family_disease (pa_id, fam_disease_name, fam_disease_startd, fam_disease_endd, fam_disease_duration ) VALUES ('$pa_id', '$fam_disease_name', '$fam_disease_startd', '$fam_disease_endd', '$fam_disease_duration')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:familyd.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>



