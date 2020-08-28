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
$pa_immu_date = mysqli_real_escape_string($link, $_REQUEST['pa_immu_date']);
$pa_immu_name = mysqli_real_escape_string($link, $_REQUEST['pa_immu_name']);
$pa_immu_bodypart = mysqli_real_escape_string($link, $_REQUEST['pa_immu_bodypart']);
$pa_immu_dose = mysqli_real_escape_string($link, $_REQUEST['pa_immu_dose']);
$vaccinator = mysqli_real_escape_string($link, $_REQUEST['vaccinator']);



//Check if values ia already in the database
$sql = "SELECT * FROM patient_immu WHERE pa_id='$pa_id' AND pa_immu_date='$pa_immu_date' AND pa_immu_name='$pa_immu_name'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0)
    {
//If it exists, don't insert it

        echo 'Record already exists. </br> <a href="add_immunization_form.php">Back to add immunization record</a>';
        
    }
//If it does not exist, then insert it

    else 
    {

// Attempt insert query execution
$sql = "INSERT INTO patient_immu (pa_id, pa_immu_date, pa_immu_name, pa_immu_bodypart, pa_immu_dose, vaccinator ) VALUES ('$pa_id', '$pa_immu_date', '$pa_immu_name', '$pa_immu_bodypart', '$pa_immu_dose', '$vaccinator')";
if(mysqli_query($link, $sql)){

    echo "Records added successfully."; 
        {
        //  To redirect form on a particular page
        header("Location:immunization.php");
        }

                   

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>



