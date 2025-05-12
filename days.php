<!DOCTYPE html>
<?php
    include_once "db.php";
    session_start();
    $codFiscale = $_SESSION['codFiscale'] ?? '';
    // Verifica se il codice fiscale è stato passato tramite POST
    if (isset($_POST['codFiscale'])) {
        $_SESSION['codFiscale'] = $_POST['codFiscale'];
        $codFiscale = $_SESSION['codFiscale'];
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Workdays</title>
        <link rel="stylesheet" href="/ADP-VLC/style/days.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    </head>
    <body>
        <header>
            <div id="toolbar">
                <div id="toolbar-logo">
                    <img src="/ADP-VLC/style/drawable/logoBeeEfficient(2).png" alt="Logo" width="80" height="30">
                </div>
                |
                <form action="add-workday.php" method="post" style="display:inline;">
                    <input type="hidden" name="codFiscale" value="<?php echo htmlspecialchars($_SESSION['codFiscale']); ?>">
                    <button type="submit" class="toolbar-item" style="background:none; border:none; cursor:pointer; padding:0;">
                        Aggiungi Giorno
                    </button>
                </form>
                |
                <a href="infoPage.php">
                    <div class="toolbar-item">
                        Chi Siamo?
                    </div>
                </a>
            </div>
        </header>
        <?php
            $dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
            if ($dbConn) {
                // La query da eseguire
                $querySql = "SELECT * FROM dipendenti WHERE codFiscale = '" . $_SESSION['codFiscale'] . "'";
            
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
                        echo "<div id='headerEmployee'>";
                        echo "<div id='employee-name'>{$_SESSION['nome']} {$_SESSION['cognome']}</div>";
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
        }
        ?>
        <div id="containerLogo">
            <img src="/ADP-VLC/style/drawable/logoBeeEfficient(1).png" alt="Logo" width="auto" height="150">
        </div>
        <div id="employee-icon">
            <img src="/ADP-VLC/style/drawable/bee_worker(2).png" alt="beeWorker" width="200" height="200">
        </div>
        <?php
        echo "</div>";// Chiusura del div headerEmployee
        ?>
        <table id="daysTable" cellpadding="3" cellspacing="0">
            <thead>
                <tr>
                    <th>Giorno</th>
                    <th>Ore Lavorate</th>
                    <th>Feriale?</th>
                    <th>Gestione</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connessione al database
                    $dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
                    if ($dbConn) {
                        // La query da eseguire
                        $querySql = "SELECT giorno FROM lavora WHERE codFiscale = '" . $codFiscale . "'";
                    
                        // Eseguo la query
                        $queryRes = mysqli_query($dbConn, $querySql);
                    
                        // Se NON ci sono errori
                        if ($queryRes) {
                            // Controllo se ci sono risultati
                            if (mysqli_num_rows($queryRes) > 0) {
                                // Ciclo attraverso i risultati
                                while ($row = mysqli_fetch_assoc($queryRes)) {
                                    $nomeGiorno = $row['giorno'];
                                    $queryDays = "SELECT * FROM giorni WHERE nome = '" . $nomeGiorno . "'";
                                    $queryResDays = mysqli_query($dbConn, $queryDays);
                                    if ($queryResDays) {
                                        // Controllo se ci sono risultati
                                        if (mysqli_num_rows($queryResDays) > 0) {
                                            // Ciclo attraverso i risultati
                                            while ($rowDays = mysqli_fetch_assoc($queryResDays)) {
                                                $giorno = $rowDays['nome'];
                                                $ore = $rowDays['ore'];
                                                $feriale = $rowDays['feriale'];
                                                echo "<tr>";
                                                echo "<td>" . htmlspecialchars($giorno) . "</td>";
                                                echo "<td>" . htmlspecialchars($ore) . "</td>";
                                                // Controllo se il giorno è feriale o festivo
                                                if ($feriale == 1) {
                                                    $feriale = "Feriale";
                                                } else {
                                                    $feriale = "Non Feriale";
                                                }
                                                echo "<td>" . htmlspecialchars($feriale) . "</td>";
                                                echo "<td><form method='post' action='remove-day-action.php' style='margin:0;'>
                                                        <input type='hidden' name='giorno' value='" . htmlspecialchars($row['giorno'], ENT_QUOTES, 'UTF-8') . "'>
                                                        <button id='submitButton' type='submit'>Rimuovi</button>
                                                    </form></td>";
                                                echo "</tr>";
                                            }
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>Errore nella query: " . htmlspecialchars(mysqli_error($dbConn)) . "</td></tr>";
                                    }
                                }
                            } else {
                                echo "<tr><td colspan='3'>Nessun risultato trovato.</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Errore nella query: " . htmlspecialchars(mysqli_error($dbConn)) . "</td></tr>";
                        }
                    
                        // Chiudo la connessione al DB
                        mysqli_close($dbConn);
                    } else {
                        echo "<tr><td colspan='3'>Errore nella connessione al DB.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>