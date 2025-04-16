<?php

// Includo i dati d'accesso al DB
include_once "db.php";

// Effettuo la connessione al DB
$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Verifico la connessione al DB
if ($dbConn) {
    // Prendiamo le variabili POST dal form inviato
    $username = htmlentities($_POST["Username"]);
    $password = md5($_POST["Password"]);

    // La query da eseguire
    $querySql = "SELECT * FROM Utenti WHERE Username = '" . $username . "' AND Password = '" . $password . "'";

    // Eseguo la query
    $queryRes = mysqli_query($dbConn, $querySql);

    // Se NON ci sono errori
    if ($queryRes) {
        if (mysqli_num_rows($queryRes) === 1) {
            // Prendo il recordo dal DB
            $row = mysqli_fetch_assoc($queryRes);

            // Creo la sessione
            session_start();

            // Memorizzo i dati nelle variabili di sessione.
            $_SESSION["UtenteID"] = $row["ID"];
            $_SESSION["UtenteUsername"] = $row["Username"];

            // Ridireziono l'utente verso questa pagina.
            header("Location: private.php");
        } else {
            header("Location: index.php?err=1");
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