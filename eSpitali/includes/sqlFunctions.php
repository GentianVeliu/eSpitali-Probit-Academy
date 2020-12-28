<?php
global $dbcon;
function connection()
{
    $dbcon = mysqli_connect('localhost','root','','spitali');
    if(!$dbcon)
    {
        die(mysqli_error($dbcon));
    }
    return $dbcon;
}
connection();

//(Fillimi)Funksionet per Doktoret
function merrDoktoret(){
    $dbcon = connection();
    $sql = "SELECT * FROM users WHERE roli = 2";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function shtoDoktor($emri, $mbiemri, $email,$username,$password){
    $dbcon = connection();
    $sql = "INSERT INTO users(emri, mbiemri, email, username, password,roli)";
    $sql.="VALUES('$emri','$mbiemri', '$email', '$username','$password', 2)";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: doktoret.php');
    }
}

function merrDoktorinId($doktorid){
    $dbcon = connection();
    $sql = "SELECT * FROM users WHERE userid = $doktorid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function modifikoDoktor($doktorid, $emri, $mbiemri, $email, $username, $password){
    $dbcon = connection();
    $sql = "UPDATE users SET emri = '$emri', mbiemri = '$mbiemri', email = '$email', username = '$username', password = '$password' WHERE userid = $doktorid ";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: doktoret.php');
    }
}
//(Fundi)Funksionet per Doktoret

//(Fillimi)Funksionet per Terapite
function merrTerapite(){
    $dbcon = connection();
    $sql = "SELECT t.*, u.emri as emripacientit FROM terapia t INNER JOIN users u ON t.userid = u.userid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function shtoTerapi($userid, $emriterapise, $diagnoza, $medikamentet, $dataekontrollimit){
    $dbcon = connection();
    $sql = "INSERT INTO terapia(userid, emriterapise, diagnoza, medikamentet, dataekontrollimit)";
    $sql.="VALUES('$userid','$emriterapise','$diagnoza', '$medikamentet','$dataekontrollimit')";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: terapija.php');
    }
}

function merrTerapiteId($terapiaid){
    $dbcon = connection();
    $sql = "SELECT * FROM terapia WHERE terapiaid = $terapiaid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function modifikoTerapi($terapiaid, $userid, $emriterapise, $diagnoza, $medikamentet, $dataekontrollimit){
    $dbcon = connection();
    $sql = "UPDATE terapia SET userid = '$userid', emriterapise = '$emriterapise', diagnoza = '$diagnoza',
    medikamentet = '$medikamentet', dataekontrollimit = '$dataekontrollimit' WHERE terapiaid = $terapiaid";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: terapija.php');
    }
}
//(Fundi)Funksionet per Terapite

//(Fillimi)Funksionet per Pacientet
function merrPacientet(){
    $dbcon = connection();
    $sql = "SELECT * FROM users WHERE roli = 3";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function shtoPacient($emri, $mbiemri, $email, $username, $password){
    $dbcon = connection();
    $sql = "INSERT INTO users(emri, mbiemri, email, username, password, roli)";
    $sql.="VALUES('$emri','$mbiemri', '$email', '$username','$password', 3)";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: pacientet.php');
    }
}

function merrPacientinId($pacientid){
    $dbcon = connection();
    $sql = "SELECT * FROM users WHERE userid = $pacientid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function modifikoPacient($pacientid, $emri, $mbiemri, $email, $username, $password){
    $dbcon = connection();
    $sql = "UPDATE users SET emri = '$emri', mbiemri = '$mbiemri', email = '$email', username = '$username', password = '$password' WHERE userid = $pacientid ";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: pacientet.php');
    }
}
//(Fundi)Funksionet per Pacientet


//Funksioni per Log In
function login($username, $password)
{
    $dbcon = connection();
    $sql = "SELECT u.*, t.* FROM users u INNER JOIN terapia t ON u.userid = t.userid WHERE username = '$username' AND password = '$password'";;
    $result = mysqli_query($dbcon, $sql);
    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $res = mysqli_fetch_assoc($result);
            
            if($res['roli'] == 1)
            {
                    header("Location: index.php");
                    session_start();
                    $_SESSION['adminiid'] = $res['userid'];
                    $_SESSION['emri'] = $res['emri'];
                    $_SESSION['mbiemri'] = $res['mbiemri'];
                    $_SESSION['roli'] = $res['roli'];
                    $_SESSION['email'] = $res['email'];
                    $_SESSION['username'] = $res['username'];
                    $_SESSION['emriterapise'] = $res['emriterapise'];
                    $_SESSION['diagnoza'] = $res['diagnoza'];
                    $_SESSION['medikamentet'] = $res['medikamentet'];
                    $_SESSION['dataekontrollimit'] = $res['emriterapise'];
            }
            elseif($res['roli'] == 2)
            {
                    header("Location: index.php");
                    session_start();
                    $_SESSION['doktorid'] = $res['userid'];
                    $_SESSION['emri'] = $res['emri'];
                    $_SESSION['mbiemri'] = $res['mbiemri'];
                    $_SESSION['roli'] = $res['roli'];
                    $_SESSION['email'] = $res['email'];
                    $_SESSION['username'] = $res['username'];
                    $_SESSION['emriterapise'] = $res['emriterapise'];
                    $_SESSION['diagnoza'] = $res['diagnoza'];
                    $_SESSION['medikamentet'] = $res['medikamentet'];
                    $_SESSION['dataekontrollimit'] = $res['emriterapise'];
            }
            else
            {
                    header("Location: index.php");
                    session_start();
                    $_SESSION['pacientid'] = $res['userid'];
                    $_SESSION['emri'] = $res['emri'];
                    $_SESSION['mbiemri'] = $res['mbiemri'];
                    $_SESSION['roli'] = $res['roli'];
                    $_SESSION['email'] = $res['email'];
                    $_SESSION['username'] = $res['username'];
                    $_SESSION['emriterapise'] = $res['emriterapise'];
                    $_SESSION['diagnoza'] = $res['diagnoza'];
                    $_SESSION['medikamentet'] = $res['medikamentet'];
                    $_SESSION['dataekontrollimit'] = $res['emriterapise'];

            }
        }
    }
}

