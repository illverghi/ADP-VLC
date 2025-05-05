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
                <div style="position: relative; width: 100%;">
                    <input type="password" id="password" name="password">
                    <img id="togglePassword" src="/ADP-VLC/style/drawable/bee_hidden.png" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);
                        width: 24px; height: 24px; cursor: pointer;"></img>
                </div>
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
        if (password.length < 8) {
            event.preventDefault();
            alert("La password deve essere lunga almeno 8 caratteri.");
        }
        if (!/^[a-zA-Z0-9]+$/.test(username)) {
            event.preventDefault();
            alert("Lo username può contenere solo lettere e numeri.");
        }
        if (username.length < 3 || username.length > 50) {
            event.preventDefault();
            alert("Lo username deve essere lungo tra 3 e 50 caratteri.");
        }
        if (nome.length < 3 || nome.length > 50) {
            event.preventDefault();
            alert("Il nome deve essere lungo tra 3 e 50 caratteri.");
        }
        if (cognome.length < 3 || cognome.length > 50) {
            event.preventDefault();
            alert("Il cognome deve essere lungo tra 3 e 50 caratteri.");
        }
        if (!/^[a-zA-Z0-9]+$/.test(nome)) {
            event.preventDefault();
            alert("Il nome può contenere solo lettere e numeri.");
        }
        if (!/^[a-zA-Z0-9]+$/.test(cognome)) {
            event.preventDefault();
            alert("Il cognome può contenere solo lettere e numeri.");
        }
        if (!/^[a-zA-Z0-9]+$/.test(password)) {
            event.preventDefault();
            alert("La password può contenere solo lettere e numeri.");
        }
    });
    document.getElementById("togglePassword").addEventListener("click", function () {
        const passwordField = document.getElementById("password");
        const isPassword = passwordField.type === "password";
        
        passwordField.type = isPassword ? "text" : "password";
        this.src = isPassword ? "/ADP-VLC/style/drawable/bee_visible.png" : "/ADP-VLC/style/drawable/bee_hidden.png";
    });
</script>
</html>