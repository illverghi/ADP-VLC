<html>
    <head>
        <link rel="stylesheet" href="/ADP-VLC/style/private.css"> 
        <title>Private Page</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
        include_once "db.php";
        session_start();
    ?>


    <body>
        <div id="containerLogo">
            <img src="/ADP-VLC/style/drawable/logoBeeEfficient(1).png" alt="Logo" class="logo" style="width: 300px; height: auto;">
        </div>
        <div id="containerLogin">
            <form method="POST" action="company-login-action.php">
                <label for="codice">Codice Azienda</label> <br>
                <input name="codice" type="text"> <br><br>

                <label for="password">Password</label> <br>
                <input name="password" type="password"> <br><br>
                <div class="submit-container">
                    <div>
                        <a href="company-creation.php" class="register-button">Crea Azienda</a>
                    </div>
                    <input type="submit" value="Accedi">
                </div>
            </form>
        </div>
    </body>
</html>

<?php
/*
if (isset($_SESSION['UtenteUsername'])) {
    $username = htmlspecialchars($_SESSION['UtenteUsername'], ENT_QUOTES, 'UTF-8');
    echo "<h1>Welcome, $username!</h1>";
} else {
    echo "<h1>Username not found in session.</h1>";
}
?>*/

