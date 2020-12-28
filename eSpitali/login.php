<?php include_once('includes/sqlFunctions.php'); ?>
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

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    login($username, $password);
}
?>

<body>
    <div class="login-page">
        <h1 class="loginh1">Login</h1>

        <p class="errors" style="margin-bottom: 5px;"></p>
        <form class="login-form" id="loginForm" method="post">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="username" id="username" name="username" />
                <p id="usernameMessage" class="errors"></p>
                <div style="clear: both;"></div>
            </div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="password" id="password" name="password" />
                <p id="passwordMessage" class="errors"></p>
                <div style="clear: both;"></div>
            </div>
            <br><br>
            <input class="btnlogin" type="submit" value="Login" name="login">
        </form>
    </div>
    <script src="js/jQuery.js"></script>
    <script>
        $(document).ready(function() {
            $("#loginForm").submit(function() {
                var username = $("#username").val();
                var password = $("#password").val();
                var errors = false;
                if (username == "") {
                    $("#usernameMessage").html("Please write username!");
                    errors = true;
                } else {
                    $("#usernameMessage").html("");
                    errors = false;
                }
                if (password == "") {
                    $("#passwordMessage").html("Please write password!");
                    errors = true;
                } else {
                    $("#passwordMessage").html("");
                    errors = false;
                }
                if (errors) {
                    return false;
                } else {
                    return true;
                }
            });
        });
    </script>

</body>

</html>