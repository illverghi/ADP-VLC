<?php
    session_start();
    include_once "db.php";

    /*
    if (isset($_SESSION['codice'])) {
        $codice = htmlspecialchars($_SESSION['codice'], ENT_QUOTES, 'UTF-8');
        echo "<h1>Welcome, company n. $codice!</h1>";
    } else {
        echo "<h1>Cod not found in session.</h1>";
    }
        */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Company Private Area</title>
    <link rel="stylesheet" href="/ADP-VLC/style/private-company.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
</head>
<body>
    <header>
        <div id="toolbar">
            <div id="toolbar-logo">
                <img src="/ADP-VLC/style/drawable/logoBeeEfficient(2).png" alt="Logo" width="80" height="30">
            </div>
            |
            <a href="/ADP-VLC/add-employer.php">
                <div class="toolbar-item">
                    Aggiungi Dipendente
                </div>
            </a>
            |
            <a href="infoPage.php">
                <div class="toolbar-item">
                    Chi Siamo?
                </div>
            </a>
            |
            <a href="private.php">
                <div class="toolbar-arrow">
                    <img src="/ADP-VLC/style/drawable/bee-backArrow.png" alt="Arrow" width="40" height="40">
                </div>
            </a>
            
        </div>
    </header>
    <div id="containerCompanyName">
        <h1><?php echo $_SESSION["nome"] ?></h1>
    </div>
    <table id="employeeTable"cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Codice Fiscale</th>
            <th>Data di Nascita</th>
            <th>Data di Assunzione</th>
            <th>Gestione</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        $dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

        // Verifico la connessione
        if ($dbConn) {
            // Creo la query
            $querySql = "SELECT nome, cognome, codFiscale, nascita, assunzione FROM dipendenti WHERE codAzienda = '" . $_SESSION["codice"] . "'";

            $queryRes = mysqli_query($dbConn, $querySql);

            if ($queryRes) {
                if (mysqli_num_rows($queryRes) > 0) {
                    // Stampo le righe della tabella
                    while ($row = mysqli_fetch_assoc($queryRes)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cognome']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['codFiscale']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nascita']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['assunzione']) . "</td>";
                        echo "<td><form method='post' action='employee.php' style='margin:0;'>
                                <input type='hidden' name='codFiscale' value='" . htmlspecialchars($row['codFiscale'], ENT_QUOTES, 'UTF-8') . "'>
                                <button id='submitButton' type='submit'>Gestisci</button>
                              </form></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nessun risultato trovato.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Errore nella query: " . htmlspecialchars(mysqli_error($dbConn)) . "</td></tr>";
            }

            // Chiudo la connessione
            mysqli_close($dbConn);
        } else {
            echo "<tr><td colspan='5'>Errore nella connessione al DB.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>