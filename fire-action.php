<?php

// Includo i dati d'accesso al DB
include_once "db.php";
session_start();

// Effettuo la connessione al DB
$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Verifico la connessione al DB
if ($dbConn) {
    // Prendiamo le variabili POST dal form inviato
    $codFiscale = htmlentities($_POST["codFiscale"]);
    $codAzienda = htmlentities($_POST["codAzienda"]);

    // La query da eseguire
    $querySql = "DELETE FROM dipendenti 
                    WHERE codFiscale = '" . $codFiscale . "' AND codAzienda = '" . $codAzienda . "'";

    // Eseguo la query
    $queryRes = mysqli_query($dbConn, $querySql);

    // Se NON ci sono errori
    if ($queryRes) {
        $_SESSION['codAzienda'] = $codAzienda;
        header("Location: company-private.php");
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