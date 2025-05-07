<!DOCTYPE html>
<?php
    include_once "db.php";
    session_start();
    if (isset($_POST['codFiscale'])) {
        $_SESSION['codFiscale'] = $_POST['codFiscale'];
        $codFiscale = $_SESSION['codFiscale'];
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee Page</title>
        <link rel="stylesheet" href="/ADP-VLC/style/employee.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    </head>
    <body>
        <header>
            <div id="toolbar">
                <div id="toolbar-logo">
                    <img src="/ADP-VLC/style/drawable/logoBeeEfficient(2).png" alt="Logo" width="80" height="30">
                </div>
                |
                <a href="">
                    <div class="toolbar-item">
                        Chi Siamo?
                    </div>
                </a>
                |
                <a href="company-private.php">
                    <div class="toolbar-arrow">
                        <img src="/ADP-VLC/style/drawable/bee-backArrow.png" alt="Arrow" width="40" height="40">
                    </div>
                </a>
            </div>
        </header>
        <?php
            $dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
            if ($dbConn) {
            
                // La query da eseguire
                $querySql = "SELECT nome, cognome FROM dipendenti WHERE codFiscale = '" . $codFiscale . "'";
            
                // Eseguo la query
                $queryRes = mysqli_query($dbConn, $querySql);
            
                // Se NON ci sono errori
                if ($queryRes) {
                    if (mysqli_num_rows($queryRes) === 1) {
                        // Prendo il recordo dal DB
                        $row = mysqli_fetch_assoc($queryRes);
            
                        // Memorizzo i dati nelle variabili di sessione.
                        $_SESSION["nome"] = $row["nome"];
                        $_SESSION["cognome"] = $row["cognome"];
                        echo "<div id='employee-name'>{$_SESSION['nome']} {$_SESSION['cognome']}</div>";
                    }
                }
                else {
                    echo "Errore nella query: " . mysqli_error($dbConn);
                }
            
                // Chiudo la connessione al DB
                mysqli_close($dbConn);
            }
            else {
                echo "Errore nella connessione al DB.";
            }
        ?>
        <div id="employee-icon">
            <img src="/ADP-VLC/style/drawable/bee_worker(2).png" alt="beeWorker" width="200" height="200">
        </div>
    </body>
</html>
