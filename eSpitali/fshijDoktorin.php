<?php 
include_once('includes/sqlFunctions.php'); 

function fshijDoktorin(){
    $doktorid = $_POST['doktorid'];
    $dbcon = connection();
    $sql = "DELETE FROM users WHERE userid = $doktorid";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header("Location: doktoret.php");
    }
}
fshijDoktorin();
?>
