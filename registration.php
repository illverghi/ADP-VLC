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
                <label for="nome">Nome</label> <br>
                <input name="nome" type="text"> <br><br>

                <label for="cognome">Cognome</label> <br>
                <input name="cognome" type="text"> <br><br>
            </div>
            <div class="text-container">
                <label for="username">Username</label> <br>
                <input name="username" type="text"> <br><br>

                <label for="password">Password</label> <br>
                <input name="password" type="password"> <br><br>
            </div>
            <input type="submit" value="Registrati" class="register-button">
        </form>
    </div>
</body>
<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        const nome = document.querySelector("input[name='nome']").value.trim();
        const cognome = document.querySelector("input[name='cognome']").value.trim();
        const username = document.querySelector("input[name='username']").value.trim();
        const password = document.querySelector("input[name='password']").value.trim();

        if (!nome || !cognome || !username || !password) {
            event.preventDefault();
            alert("Tutti i campi devono essere compilati.");
        }
    });
</script>