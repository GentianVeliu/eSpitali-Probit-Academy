<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sqlFunctions.php'); ?>

<div class="" style="background-image:url('images/patient.jpg'); background-size: cover;">
    <div id="pageintro" class="healthfoto">
        <article>
            <h3 class="heading">List of Patient</h3>
            <p class="thenie1">"The best Doctor is your mind."</p>
        </article>
    </div>
</div>

<div class="tabela">
    <h1 id="h1therapy">Patient</h1>
    <div style="clear: both;"></div>
    <table id="tabelaterapia">
    <thead>
        <tr>
            <th>Patient ID</th>
            <th>Patient name</th>
            <th>Patient surname</th>
            <th>Email</th>
            <th>Username</th>
            <?php if ((isset($_SESSION['adminiid']) && $_SESSION['roli'] == 1) || (isset($_SESSION['doktorid']) && $_SESSION['roli'] == 2)) : ?>
            <th>Modify</th>
            <th>Delete</th>
            <?php endif; ?>
        </tr>
        </thead>

        <tbody>
        
        <?php if(isset($_SESSION['pacientid'])) : ?>
        <tr>
        <td><?php echo $_SESSION['pacientid']; ?></td>
        <td><?php echo $_SESSION['emri']; ?></td>
        <td><?php echo $_SESSION['mbiemri']; ?></td>
        <td><?php echo $_SESSION['email']; ?></td>
        <td><?php echo $_SESSION['username']; ?></td>
        </tr>
        <?php else : ?>
        <?php $pacientet = merrPacientet();
        while ($pacienti = mysqli_fetch_assoc($pacientet)) { ?>
        <tr>
        <td><?php echo $pacienti['userid']; ?></td>
        <td><?php echo $pacienti['emri']; ?></td>
        <td><?php echo $pacienti['mbiemri']; ?></td>
        <td><?php echo $pacienti['email']; ?></td>
        <td><?php echo $pacienti['username']; ?></td>
        
        <?php if ((isset($_SESSION['adminiid']) && $_SESSION['roli'] == 1) || (isset($_SESSION['doktorid']) && $_SESSION['roli'] == 2)) : ?>
            <td id="modifiko">
                <a href="shto_modifiko_pacientet.php?pacientid=<?php echo $pacienti['userid']; ?>">
                    <i class="fa fa-pencil-square-o"></i>
                </a>
            </td>
            <td id="fshiej">
                <form action="fshijPacientin.php" method="post">
                    <input type="text" name="pacientid" hidden value="<?php echo $pacienti['userid']; ?>">
                    <button type="submit" style="border: none;background-color:transparent;cursor:pointer;" name="deletePacient" onclick="return fshijPacientin()">
                    <i class="fas fa-trash"></i>
                    </button>
                </form>
                <script>
                    function fshijPacientin() 
                    {
                        $confirm = confirm('Are you sure you want to delete the Patient?');
                        if ($confirm)
                        {
                            return true;
                        } 
                        else
                        {
                            return false;
                        }
                    }
                </script>
                </td>
                <?php endif; ?>
                <?php } ?>
                <?php endif ; ?>
                
            </tr>
                
        </tbody>
    </table>
    <?php if ((isset($_SESSION['adminiid']) && $_SESSION['roli'] == 1) || (isset($_SESSION['doktorid']) && $_SESSION['roli'] == 2)) : ?>
    <button id="shtoterapi" onclick="window.location.href='shto_modifiko_pacientet.php'"><i class="fa fa-plus" aria-hidden="true"></i>Add Patient</button>
    <?php endif; ?>
    <div style="clear: both;"></div>
</div>
<br>
<?php include_once('includes/footer.php'); ?>