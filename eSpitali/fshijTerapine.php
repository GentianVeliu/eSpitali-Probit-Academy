<?php 
include_once('includes/sqlFunctions.php'); 

function fshijTerapine(){
    $terapiaid = $_POST['terapiaid'];
    $dbcon = connection();
    $sql = "DELETE FROM terapia WHERE terapiaid = $terapiaid";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header("Location: terapija.php");
    }
}
fshijTerapine();
?>
