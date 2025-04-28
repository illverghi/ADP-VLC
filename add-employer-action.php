<?php

// Includo i dati d'accesso al DB
include_once "db.php";
session_start();
// Effettuo la connessione al DB
$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Verifico la connessione al DB
if ($dbConn) {
    // Prendiamo le variabili POST dal form inviato
    $codAzienda = $_SESSION["codice"];
    $nome = htmlentities($_POST["nome"]);
    $cognome = htmlentities($_POST["cognome"]);
    $codFiscale = htmlentities($_POST["codFiscale"]);
    $nascita = htmlentities($_POST["nascita"]);
    $assunzione = htmlentities($_POST["assunzione"]);
    $queryCodFiscale = "SELECT * FROM dipendenti WHERE codFiscale = '" . $codFiscale . "'";
    $queryResCodFiscale = mysqli_query($dbConn, $queryCodFiscale);
    // La query da eseguire
    if (mysqli_num_rows($queryResCodFiscale) > 0) {
        // Se il codice fiscale è già presente nel DB, ridireziono l'utente verso questa pagina.
        header("Location: add-employer.php?err=1");
        exit;
    }
    $querySql = "INSERT INTO dipendenti (nome, cognome, codFiscale, nascita, assunzione, codAzienda) VALUES ('" . $nome . "', '" . $cognome . "', '" . $codFiscale . "', '" . $nascita . "', '" . $assunzione . "', '" . $codAzienda . "')";
    
    // Eseguo la query
    $queryRes = mysqli_query($dbConn, $querySql);

    // Se NON ci sono errori
    if ($queryRes) {
            // Creo la sessione
            session_start();

            // Ridireziono l'utente verso questa pagina.
            header("Location: company-private.php");        
    }
    else {
        echo "Errore nella query: " . mysqli_error($dbConn);
        header("Location: company-private.php?err=1");        
    }

    // Chiudo la connessione al DB
    mysqli_close($dbConn);
}
else {
    echo "Errore nella connessione al DB.";
}