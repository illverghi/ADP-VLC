<?php

// Includo i dati d'accesso al DB
include_once "db.php";

// Effettuo la connessione al DB
$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Verifico la connessione al DB
if ($dbConn) {
    // Prendiamo le variabili POST dal form inviato
    $nome = htmlentities($_POST["nome"]);
    $cognome = htmlentities($_POST["cognome"]);
    $username = htmlentities($_POST["username"]);
    $password = md5($_POST["password"]);
    $queryUsername = "SELECT * FROM utenti WHERE username = '" . $username . "'";
    $queryResUsername = mysqli_query($dbConn, $queryUsername);
    // La query da eseguire
    if (mysqli_num_rows($queryResUsername) > 0) {
        

        header("Location: registration.php?err=1");
        exit;
    }
    $querySql = "INSERT INTO utenti (nome, cognome, username, password) VALUES ('" . $nome . "', '" . $cognome . "', '" . $username . "', '" . $password . "')";
    
    // Eseguo la query
    $queryRes = mysqli_query($dbConn, $querySql);

    // Se NON ci sono errori
    if ($queryRes) {
            // Creo la sessione
            session_start();

            // Memorizzo i dati nelle variabili di sessione.
            $_SESSION["UtenteID"] = $row["id"];
            $_SESSION["UtenteUsername"] = $row["username"];

            // Ridireziono l'utente verso questa pagina.
            header("Location: index.php");        
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