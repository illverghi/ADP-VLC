<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee Page</title>
        <link rel="stylesheet" href="/ADP-VLC/style/employee.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    </head>
    <body>
        <?php
            session_start();

            if (isset($_POST['codFiscale'])) {
                $_SESSION['codFiscale'] = $_POST['codFiscale'];
            }

            if (isset($_SESSION['codFiscale'])) {
                echo "<h1>" . $_SESSION['codFiscale']."<h1";
            } else {
                echo "Nessun dipendente trovato nella sessione.";
            }
        ?>
    </body>
</html>
