<?php
    include_once "db.php";
?>

<head>
<link rel="stylesheet" href="/ADP-VLC/style/registration.css"> 
</head>
<body>
    <div id="containerLogo">
        <img src="/ADP-VLC/style/drawable/logoBeeEfficient(1).png" alt="Logo" class="logo" style="width: 300px; height: auto;">
    </div>
    <div id="containerRegistration">
        <form method="POST" action="registration-action.php">
            <div class="text-container">
                <label for="Nome">Nome</label> <br>
                <input name="Nome" type="text"> <br><br>

                <label for="Cognome">Cognome</label> <br>
                <input name="Cognome" type="text"> <br><br>
            </div>
            <div class="text-container">
                <label for="Username">Username</label> <br>
                <input name="Username" type="text"> <br><br>

                <label for="Password">Password</label> <br>
                <input name="Password" type="password"> <br><br>
            </div>
            <input type="submit" value="Registrati" class="register-button">
        </form>
    </div>
</body>
