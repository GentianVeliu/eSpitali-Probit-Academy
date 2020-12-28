<?php include_once('includes/sqlFunctions.php'); ?>
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
    if (isset($_POST['shtoTerapi'])) {
        $userid = $_POST['userid'];
        $emriterapise = $_POST['emriterapise'];
        $diagnoza = $_POST['diagnoza'];
        $medikamentet = $_POST['medikamentet'];
        $dataekontrollimit = $_POST['dataekontrollimit'];
        shtoTerapi($_POST['userid'], $_POST['emriterapise'], $_POST['diagnoza'], $_POST['medikamentet'], $_POST['dataekontrollimit']);
    }

    if (isset($_GET['terapiaid'])) {
        $terapija = mysqli_fetch_assoc(merrTerapiteId($_GET['terapiaid']));
    }

    if (isset($_POST['modifikoTerapi'])) {
        $userid = $_POST['userid'];
        $emriterapise = $_POST['emriterapise'];
        $diagnoza = $_POST['diagnoza'];
        $medikamentet = $_POST['medikamentet'];
        $dataekontrollimit = $_POST['dataekontrollimit'];
        modifikoTerapi($_GET['terapiaid'], $userid, $emriterapise, $diagnoza, $medikamentet, $dataekontrollimit);
    }
    ?>

    <div class="login-page register-page">
        <?php if (isset($_GET['terapiaid'])) : ?>
            <h1 class="loginh1">Modify a Therapy</h1>
        <?php else : ?>
            <h1 class="loginh1">Write a Therapy</h1>
        <?php endif ?>
        <form class="login-form" id="loginForm" method="post">

            <div class="textbox">
                <i class="fas fa-id-card"></i>
                <input type="text" placeholder="ID of Pacient" id="userid" name="userid" value="<?php if (isset($_GET['terapiaid'])) : echo $terapija['userid'];
                                                                                                endif ?>" />
            </div>

            <div class="textbox">
            <i class="fas fa-diagnoses"></i>
                <input type="text" placeholder="Name of Therapy" id="emriterapise" name="emriterapise" value="<?php if (isset($_GET['terapiaid'])) : echo $terapija['emriterapise'];
                                                                                                                endif ?>" />
            </div>
            <div class="textbox">
                <i class="fas fa-comment-medical"></i>
                <input type="text" placeholder="Diagnostic" id="diagnoza" name="diagnoza" value="<?php if (isset($_GET['terapiaid'])) : echo $terapija['diagnoza'];
                                                                                                    endif ?>" />
            </div>
            <div class="textbox">
                <i class="fas fa-pills"></i>
                <input type="text" placeholder="Medications" id="medikamentet" name="medikamentet" value="<?php if (isset($_GET['terapiaid'])) : echo $terapija['medikamentet'];
                                                                                                            endif ?>" />
            </div>
            <div class="textbox">
                <i class="far fa-calendar-check"></i>
                <input type="date" placeholder="Date of control	" id="dataekontrollimit" name="dataekontrollimit" value="<?php if (isset($_GET['terapiaid'])) : echo $terapija['dataekontrollimit'];
                                                                                                                            endif ?>" />
            </div><br>

            <?php if (isset($_GET['terapiaid'])) : ?>
                <input class="btnlogin" type="submit" value="Modify" name="modifikoTerapi">
            <?php else : ?>
                <input class="btnlogin" type="submit" value="Add" name="shtoTerapi">
            <?php endif ?>
        </form>
        <div style="clear: both;"></div>
    </div>
</body>

</html>