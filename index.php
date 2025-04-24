<?php
    include_once "db.php";
?>

<head>
<link rel="stylesheet" href="/ADP-VLC/style/login.css"> 
</head>
<body>
    <div id="containerLogo">
        <img src="/ADP-VLC/style/drawable/logoBeeEfficient(1).png" alt="Logo" class="logo" style="width: 300px; height: auto;">
    </div>
    <div id="containerLogin">
        <form method="POST" action="login-action.php">
            <label for="Username">Username</label> <br>
            <input name="Username" type="text"> <br><br>

            <label for="Password">Password</label> <br>
            <input name="Password" type="password"> <br><br>
            <div class="submit-container">
                <div>
                    <a href="registration.php" class="register-button">Registrati</a>
                </div>
                <input type="submit" value="Accedi">
            </div>
        </form>
    </div>
</body>
