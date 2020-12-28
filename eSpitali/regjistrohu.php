<!DOCTYPE html>
<html>

<head>
    <title>eSPITALI</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/711123f798.js" crossorigin="anonymous"></script>


    <style>
        .errors {
            color: red;
            font-size: 12px;
            float: left;
            margin-left: 30px;
            margin: -12px 0px -12px 30px;
        }
    </style>
</head>
<div class="login-page register-page">
    <h1 class="loginh1">Register</h1>

    <p class="errors" style="margin-bottom: 5px;"></p>
    <form class="login-form" id="loginForm" method="post">
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="name" id="emri" name="emri" />
        </div>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="surname" id="mbiemri" name="mbiemri" />
        </div>
        <div class="textbox">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="email" id="email" name="email" />
        </div>
        <div class="textbox">
            <i class="fas fa-phone-square-alt"></i>
            <input type="text" placeholder="telephone" id="telefoni" name="telefoni" />
        </div>
        <div class="textbox">
            <i class="fas fa-map-marker-alt"></i>
            <input type="text" placeholder="address" id="adresa" name="adresa" />
        </div>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="username" id="username" name="username" />
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="password" id="password" name="password" />
        </div>
        <div class="textbox">
            <i class="fas fa-user-shield"></i>
            <input type="text" placeholder="role" id="roli" name="roli" />
        </div>
        <p style="margin-right: 25px;float:right">Already have an account?<span><a style="color: #fff;text-decoration:none;padding-left:10px" href="login.php">Login here</a></span></p>
        <input class="btnlogin" type="submit" value="Register" name="register">
    </form>
</div>