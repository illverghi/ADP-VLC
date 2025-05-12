<?php
    include_once "db.php";
    session_start();
    if (isset($_POST['codFiscale'])) {
        $_SESSION['codFiscale'] = $_POST['codFiscale'];
        $codFiscale = $_SESSION['codFiscale'];
    }
?>

<head>
    <title>Add Workdays</title>
    <link rel="stylesheet" href="/ADP-VLC/style/add-workday.css"> 
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
</head>
<body>
    <div id="containerLogo">
        <img src="/ADP-VLC/style/drawable/logoBeeEfficient(1).png" alt="Logo" class="logo" style="width: 300px; height: auto;">
    </div>
    <div id="containerWorkday">
        <form method="POST" action="add-workday-action.php">
            <div class="text-container">
                <label for="giorno">Inserisci il giorno da aggiungere:</label> <br><br>
                <?php
                    // Connessione al DB
                    $dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
                    $querySql = "SELECT nome FROM giorni 
                                    WHERE nome NOT IN (SELECT giorno FROM lavora WHERE codFiscale = '$codFiscale')";
                    $queryRes = mysqli_query($dbConn, $querySql);
                ?>
                <input list="giorniDisponibili" name="giorni" id="giorni" required>
                <datalist id="giorniDisponibili">
                    <?php while ($row = mysqli_fetch_assoc($queryRes)) {
                        echo "<option value=\"" . htmlspecialchars($row['nome']) . "\">";
                    } ?>
                </datalist><br><br>
            </div>
            <input type="submit" value="Aggiungi Giorno" class="confirm-button">
        </form>
    </div>
</body>