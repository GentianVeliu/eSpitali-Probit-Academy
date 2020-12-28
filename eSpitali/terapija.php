<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sqlFunctions.php'); ?>

<div class="" style="background-image:url('images/terapicover.jpg'); background-size: cover;">
    <div id="pageintro" class="healthfoto">
        <article>
            <h3 class="heading">Occupational Therapy</h3>
            <p class="thenie1">"The best Doctor is your mind."</p>
        </article>
    </div>
</div>

<div class="tabela">
    <h1 id="h1therapy">Therapy</h1>
    <div style="clear: both;"></div>
    <table id="tabelaterapia">
        <thead>
            <tr>
                <th>Patient name </th>
                <th>Name of therapy</th>
                <th>Diagnostic</th>
                <th>Medications</th>
                <th>Date of control</th>
                <?php if ((isset($_SESSION['adminiid']) && $_SESSION['roli'] == 1) || (isset($_SESSION['doktorid']) && $_SESSION['roli'] == 2)) : ?>
                <th>Modify</th>
                <th>Delete</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>

        <?php if(isset($_SESSION['pacientid'])) : ?>
            <tr>
                    <td><?php echo $_SESSION['emri']; ?></td>
                    <td><?php echo $_SESSION['emriterapise']; ?></td>
                    <td><?php echo $_SESSION['diagnoza']; ?></td>
                    <td><?php echo $_SESSION['medikamentet']; ?></td>
                    <td><?php echo $_SESSION['dataekontrollimit']; ?></td>
        </tr>
        <?php else : ?>
            <?php 
            $terapite = merrTerapite();
            while ($terapija = mysqli_fetch_assoc($terapite)) { ?>
                <tr>
                    <td><?php echo $terapija['emripacientit']; ?></td>
                    <td><?php echo $terapija['emriterapise']; ?></td>
                    <td><?php echo $terapija['diagnoza']; ?></td>
                    <td><?php echo $terapija['medikamentet']; ?></td>
                    <td><?php echo $terapija['dataekontrollimit']; ?></td>

                    <td id="modifiko">
                        <a href="shto_modifiko_terapite.php?terapiaid=<?php echo $terapija['terapiaid']; ?>">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                    <td id="fshiej">
                        <form action="fshijTerapine.php" method="post">
                            <input type="text" name="terapiaid" hidden value="<?php echo $terapija['terapiaid']; ?>">
                            <button type="submit" style="border: none;background-color:transparent;cursor:pointer;" name="deleteTerapia" onclick="return fshijTerapine()">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <script>
                            function fshijTerapine() {
                                $confirm = confirm('Are you sure you want to delete this Therapy?');
                                if ($confirm) {
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        </script>
                    </td>
                </tr>
            <?php } ?>
            <?php endif; ?>
            
        </tbody>
    </table>
    <?php if ((isset($_SESSION['adminiid']) && $_SESSION['roli'] == 1) || (isset($_SESSION['doktorid']) && $_SESSION['roli'] == 2)) : ?>
    <button id="shtoterapi" onclick="window.location.href='shto_modifiko_terapite.php'"><i class="fa fa-plus" aria-hidden="true"></i>Add Therapy</button>
    <?php endif; ?>
    <div style="clear: both;"></div>
</div>
<br>
<?php include_once('includes/footer.php'); ?>