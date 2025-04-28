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
        <form method="POST" action="company-creation-action.php">
            <div class="text-container">
                <label for="nome">Nome Azienda</label> <br>
                <input name="nome" type="text"> <br><br>
            </div>
            <div class="text-container">
                <label for="password">Password</label> <br>
                <input name="password" type="password"> <br><br>
            </div>
            <input type="submit" value="Crea Azienda" class="register-button">
        </form>
    </div>
</body>
<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        const nome = document.querySelector("input[name='nome']").value.trim();
        const password = document.querySelector("input[name='password']").value.trim();
        let errori = false;

        if (!nome || !password) {
            event.preventDefault();
            alert("Tutti i campi devono essere compilati.");
            errori = true;
        }
        if (password.length < 8) {
            event.preventDefault();
            alert("La password deve essere lunga almeno 8 caratteri.");
            errori = true;
        }
        if (!/^[a-zA-Z0-9]+$/.test(nome)) {
            event.preventDefault();
            alert("Il nome dell'azienda può contenere solo lettere e numeri.");
            errori = true;
        }
        if (nome.length < 3 || nome.length > 50) {
            event.preventDefault();
            alert("Il nome dell'azienda deve essere lungo tra 3 e 50 caratteri.");
            errori = true;
        }
        if (!/^[a-zA-Z0-9]+$/.test(password)) {
            event.preventDefault();
            alert("La password può contenere solo lettere e numeri.");
            errori = true;
        }

        if (!errori) {
            alert("Registrazione avvenuta con successo!");
            // il form si invia normalmente
        }
    });
</script>
