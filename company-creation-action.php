<?php

// Includo i dati d'accesso al DB
include_once "db.php";

// Effettuo la connessione al DB
$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Verifico la connessione al DB
if ($dbConn) {
    // Prendiamo le variabili POST dal form inviato
    $nome = htmlentities($_POST["nome"]);
    $password = md5($_POST["password"]);
    $queryNome = "SELECT * FROM azienda WHERE nome = '" . $nome . "'";
    $queryResNome = mysqli_query($dbConn, $queryNome);
    // La query da eseguire
    if (mysqli_num_rows($queryResNome) === 1) {
        

        header("Location: company-creation.php?err=1");
        exit;
    }
    session_start();
    $ownerID = $_SESSION["UtenteID"];
    $querySql = "INSERT INTO azienda (nome, password, ownerID) 
                 VALUES ('" . $nome . "', '" . $password . "', '" . $ownerID . "')";
    
    // Eseguo la query
    $queryRes = mysqli_query($dbConn, $querySql);

    // Se NON ci sono errori
    if ($queryRes) {
            // Creo la sessione
            session_start();

            // Memorizzo i dati nelle variabili di sessione.
            $companyID = mysqli_insert_id($dbConn);
            $_SESSION["companyID"] = $companyID;
            $_SESSION["ownerID"] = $row["ownerID"];

            // Ridireziono l'utente verso questa pagina.
            header("Location: private.php?companyID=$companyID");        
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