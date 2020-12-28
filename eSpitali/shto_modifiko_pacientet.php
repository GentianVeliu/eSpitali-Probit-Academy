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
    if(isset($_POST['shtoPacient']))
    {
        $emri = $_POST['emri'];
        $mbiemri = $_POST['mbiemri'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        shtoPacient($emri, $mbiemri, $email, $username,$password);
    }

    if(isset($_GET['pacientid']))
    {
        $pacienti = mysqli_fetch_assoc(merrPacientinId($_GET['pacientid']));
    }

    if(isset($_POST['modifikoPacient']))
    {
        $emri = $_POST['emri'];
        $mbiemri = $_POST['mbiemri'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        modifikoPacient($_GET['pacientid'], $emri, $mbiemri, $email, $username,$password);
    }

    ?>


<div class="login-page register-page">
    <?php if(isset($_GET['pacientid'])) : ?>
        <h1 class="loginh1">Modify a Patient</h1>
    <?php else : ?>
        <h1 class="loginh1">Register a Patient</h1>
        <?php endif ?>
    <!-- <p class="errors" style="margin-bottom: 5px;"></p> -->
    <form class="login-form" id="loginForm" method="post">
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="name" id="emri" name="emri" value="<?php if(isset($_GET['pacientid'])) : echo $pacienti['emri']; endif ?>" />
        </div>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="surname" id="mbiemri" name="mbiemri" value="<?php if(isset($_GET['pacientid'])) : echo $pacienti['mbiemri']; endif ?>" />
        </div>
        <div class="textbox">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="email" id="email" name="email" value="<?php if(isset($_GET['pacientid'])) : echo $pacienti['email']; endif ?>" />
        </div>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="username" id="username" name="username" value="<?php if(isset($_GET['pacientid'])) : echo $pacienti['username']; endif ?>"/>
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="password" id="password" name="password" value="<?php if(isset($_GET['pacientid'])) : echo $pacienti['password']; endif ?>"/>
        </div><br>
        <?php if(isset($_GET['pacientid'])) : ?>
        <input class="btnlogin" type="submit" value="Modify" name="modifikoPacient">
        <?php else : ?>
            <input class="btnlogin" type="submit" value="Register" name="shtoPacient">
        <?php endif ?>
    </form>
    <div style="clear: both;"></div>
</div>
</body>
</html>