<?php 
include_once('includes/sqlFunctions.php'); 

function fshijPacientin(){
    $pacientid = $_POST['pacientid'];
    $dbcon = connection();
    $sql = "DELETE FROM users WHERE userid = $pacientid";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header("Location: pacientet.php");
    }
}
fshijPacientin();
?>
