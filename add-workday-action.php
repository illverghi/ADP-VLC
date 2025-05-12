<?php

// Includo i dati d'accesso al DB
include_once "db.php";
session_start();

// Effettuo la connessione al DB
$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Verifico la connessione al DB
if ($dbConn) {
    // Prendiamo le variabili POST dal form inviato
    $giorno = htmlentities($_POST["giorni"]);

    // La query da eseguire
    $querySql = "INSERT INTO lavora (giorno, codFiscale) 
                    VALUES ('" . $giorno . "', '" . $_SESSION['codFiscale'] . "')";

    // Eseguo la query
    $queryRes = mysqli_query($dbConn, $querySql);

    // Se NON ci sono errori
    if ($queryRes) {
        $_SESSION['codFiscale'] = $_SESSION['codFiscale'];
        header("Location: days.php");
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