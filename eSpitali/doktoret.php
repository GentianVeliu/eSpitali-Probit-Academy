<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sqlFunctions.php'); ?>

<div class="" style="background-image:url('images/cover4.jpg'); background-size: cover;">
    <div id="pageintro" class="healthfoto">
        <article>
            <h3 class="heading">TEAM OF EXPERTS</h3>
            <p class="thenie1">"Our Team of Doctors are specialized in Various Disciplines to make sure you get the Best Treatment."</p>
        </article>
    </div>
</div>

<p class="titledepartments">Our Doctors</p>
<div id="dv">
    <div class="divdoktoret">
        <img class="fotodoktoret" src="images/kardiolog.jpg" alt="Cardiologist">
        <h4>Dr. Lulzim Brovina</h4>
        <p class="txt1">Cardiologist</p>
    </div>
    <div class="divdoktoret">
        <img class="fotodoktoret" src="images/radiolog.jpg" alt="Radiologist">
        <h4>Dr. Naser Gjonbalaj</h4>
        <p class="txt2">Radiologist</p>
    </div>
    <div class="divdoktoret">
        <img class="fotodoktoret" src="images/neurolog1.jpg" alt="Neurologist">
        <h4>Dr. Ideal Hoxhaj</h4>
        <p class="txt1">Neurologist </p>
    </div>
    <div class="divdoktoret">
        <img class="fotodoktoret" src="images/urolog1.jpg" alt="Urologists">
        <h4>Dr. Agron Beqiri</h4>
        <p class="txt2">Urologists</p>
    </div>
</div>

<div id="dv">
    <div class="divdoktoret">
        <img class="fotodoktoret" src="images/stomatolog.jpg" alt="Stomatologist">
        <h4>Dr. Fisnik Mekaj</h4>
        <p class="txt1">Stomatologist</p>
    </div>
    <div class="divdoktoret">
        <img class="fotodoktoret" src="images/ortoped.jpg" alt="Ortoped">
        <h4>Dr. Zukë Xani</h4>
        <p class="txt2">Ortoped</p>
    </div>
    <div class="divdoktoret">
        <img class="fotodoktoret" src="images/neurolog2.jpg" alt="Neurologist">
        <h4>Dr. Blerim Myftiu</h4>
        <p class="txt1">Neurologist </p>
    </div>
    <div class="divdoktoret">
        <img class="fotodoktoret" src="images/urolog2.jpg" alt="Urologists">
        <h4>Dr. Ajet Xhafa</h4>
        <p class="txt2">Urologists</p>
    </div>
</div>
<div class="thenie2">
    <p class="thenie2p"><q cite="Japanese Proverb">Stethoscope is not just an instrument, It's a jewelry.</q></p>
</div>

<div class="tabela">
    <h1 id="h1therapy">Doctors</h1>
    <div style="clear: both;"></div>
    <table id="tabelaterapia">
        <thead>
            <tr>
                <th>Doctor's name</th>
                <th>Doctor's surname</th>
                <th>Email</th>
                <?php if (isset($_SESSION['adminiid']) && $_SESSION['roli'] == 1) : ?>
                    <th>Modify</th>
                    <th>Delete</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $doktoret = merrDoktoret();
            while ($doktori = mysqli_fetch_assoc($doktoret)) { ?>

                <tr>
                    <td><?php echo $doktori['emri']; ?></td>
                    <td><?php echo $doktori['mbiemri']; ?></td>
                    <td><?php echo $doktori['email']; ?></td>

                    <?php if (isset($_SESSION['adminiid']) && $_SESSION['roli'] == 1) : ?>
                        <td id="modifiko">
                            <a href="shto_modifiko_doktoret.php?doktorid=<?php echo $doktori['userid']; ?>">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                        </td>
                        <td id="fshiej">
                            <form action="fshijDoktorin.php" method="post">
                                <input type="text" name="doktorid" hidden value="<?php echo $doktori['userid']; ?>">
                                <button type="submit" style="border: none;background-color:transparent;cursor:pointer;" name="deleteDoktor" onclick="return fshijDoktorin()">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <script>
                                function fshijDoktorin() {
                                    $confirm = confirm('Are you sure you want to delete the Doctor?');
                                    if ($confirm) {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                }
                            </script>
                        </td>
                    <?php endif; ?>


                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php if (isset($_SESSION['adminiid']) && $_SESSION['roli'] == 1) : ?>
        <button id="shtoterapi" onclick="window.location.href='shto_modifiko_doktoret.php'"><i class="fas fa-plus" aria-hidden="true"></i>Add Doctor</button>
    <?php endif; ?>
    <div style="clear: both;"></div>
</div>
<br>
<?php include_once('includes/footer.php'); ?>