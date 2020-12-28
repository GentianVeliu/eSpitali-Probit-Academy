<?php include_once('includes/sqlFunctions.php');?>
<!DOCTYPE html>
<html>

<head>
    <title>eSPITALI</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/711123f798.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    if(isset($_POST['shtoDoktor']))
    {
        $emri = $_POST['emri'];
        $mbiemri = $_POST['mbiemri'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        // $password = password_hash($password, PASSWORD_DEFAULT); //me enkriptu passwordin
        shtoDoktor($emri, $mbiemri, $email, $username, $password);
    }

    if(isset($_GET['doktorid']))
    {
        $doktori = mysqli_fetch_assoc(merrDoktorinId($_GET['doktorid']));
    }

    if(isset($_POST['modifikoDoktor']))
    {
        $emri = $_POST['emri'];
        $mbiemri = $_POST['mbiemri'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        modifikoDoktor($_GET['doktorid'], $emri, $mbiemri, $email, $username, $password);
    }

    ?>


<div class="login-page register-page">
    <?php if(isset($_GET['doktorid'])) : ?>
        <h1 class="loginh1">Modify a Doctor</h1>
    <?php else : ?>
        <h1 class="loginh1">Register a Doctor</h1>
        <?php endif ?>
    <!-- <p class="errors" style="margin-bottom: 5px;"></p> -->
    <form class="login-form" id="loginForm" method="post">
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="name" id="emri" name="emri" value="<?php if(isset($_GET['doktorid'])) : echo $doktori['emri']; endif ?>" />
        </div>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="surname" id="mbiemri" name="mbiemri" value="<?php if(isset($_GET['doktorid'])) : echo $doktori['mbiemri']; endif ?>" />
        </div>
        <div class="textbox">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="email" id="email" name="email" value="<?php if(isset($_GET['doktorid'])) : echo $doktori['email']; endif ?>" />
        </div>
        
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="username" id="username" name="username" value="<?php if(isset($_GET['doktorid'])) : echo $doktori['username']; endif ?>"/>
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="password" id="password" name="password" value="<?php if(isset($_GET['doktorid'])) : echo $doktori['password']; endif ?>"/>
        </div><br>
        <?php if(isset($_GET['doktorid'])) : ?>
        <input class="btnlogin" type="submit" value="Modify" name="modifikoDoktor" title="Modify">
        <?php else : ?>
            <input class="btnlogin" type="submit" value="Register" name="shtoDoktor" title="Delete">
        <?php endif ?>
    </form>
    <div style="clear: both;"></div>
</div>
</body>
</html>