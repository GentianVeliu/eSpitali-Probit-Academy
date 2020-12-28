<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>eSPITALI</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/711123f798.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="container header">
        <div class="container1">
            <aside id="slogan">
                <p>eSPITALI</p>
                <img id="logo" src="images/logo.jpg" alt="Logo" />
            </aside>
            <nav id="navbar">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <?php ?>

                    <?php if (isset($_SESSION['adminiid']) && $_SESSION['roli'] == 1) : ?>
                        <li><a href="doktoret.php">DOCTORS</a></li>
                        <li><a href="terapija.php">THERAPY</a></li>
                        <li><a href="pacientet.php">PATIENTS</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                        <li style="margin-left:30px;"><i class="fa fa-user"></i><?php echo $_SESSION['emri'] . " " . $_SESSION['mbiemri']; ?></li>

                    <?php elseif (isset($_SESSION['doktorid']) && $_SESSION['roli'] == '2') : ?>
                        <li><a href="doktoret.php">DOCTORS</a></li>
                        <li><a href="terapija.php">THERAPY</a></li>
                        <li><a href="pacientet.php">PATIENTS</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                        <li style="margin-left:30px;"><i class="fa fa-user"></i><?php echo $_SESSION['emri'] . " " . $_SESSION['mbiemri']; ?></li>

                    <?php elseif (isset($_SESSION['pacientid']) && $_SESSION['roli'] == '3') : ?>
                        <li><a href="doktoret.php">DOCTORS</a></li>
                        <li><a href="terapija.php">THERAPY</a></li>
                        <li><a href="pacientet.php">PATIENTS</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                        <li style="margin-left:30px;"><i class="fa fa-user"></i><?php echo $_SESSION['emri'] . " " . $_SESSION['mbiemri']; ?></li>

                    <?php else : ?>
                        <li><a href="doktoret.php">DOCTORS</a></li>
                        <li><a href="login.php">LOGIN</a></li>
                    <?php endif; ?>

                </ul>
            </nav>
            <p style="color: #009933;float:right;margin-right:50px;margin-top:40px"></p>
            <div style="clear: both;"></div>
        </div>
    </header>
    <a href="#slogan"><img src="images/upbuton.png" id="fixedbutton" alt="UPButoni"></a>