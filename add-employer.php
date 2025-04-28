<?php
    include_once "db.php";
?>

<head>
<link rel="stylesheet" href="/ADP-VLC/style/registration.css"> 
<link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
</head>
<body>
    <div id="containerLogo">
        <img src="/ADP-VLC/style/drawable/logoBeeEfficient(1).png" alt="Logo" class="logo" style="width: 300px; height: auto;">
    </div>
    <div id="containerRegistration">
        <form method="POST" action="add-employer-action.php">
            <div class="text-container">
                <label for="nome">Nome</label> <br>
                <input name="nome" type="text"> <br><br>

                <label for="cognome">Cognome</label> <br>
                <input name="cognome" type="text"> <br><br>
            </div>
            <div class="text-container">
                <label for="codFiscale">Codice Fiscale</label> <br>
                <input name="codFiscale" type="text"> <br><br>

                <label for="nascita">Data di nascita</label> <br>
                <input name="nascita" type="date"> <br><br>

                <label for="assunzione">Data assunzione</label> <br>
                <input name="assunzione" type="date"> <br><br>
            </div>
            <input type="submit" value="Aggiungi Dipendente" class="register-button">
        </form>
    </div>
</body>
<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        const nome = document.querySelector("input[name='nome']").value.trim();
        const cognome = document.querySelector("input[name='cognome']").value.trim();
        const username = document.querySelector("input[name='codFiscale']").value.trim();
        const password = document.querySelector("input[name='nascita']").value.trim();
        const password = document.querySelector("input[name='assunzione']").value.trim();

        if (!nome || !cognome || !codFiscale || !nascita || !assunzione) {
            event.preventDefault();
            alert("Tutti i campi devono essere compilati.");
        }
        if (nome.length < 3 || nome.length > 50) {
            event.preventDefault();
            alert("Il nome deve essere lungo almeno 3 caratteri.");
        }
        if (!/^[a-zA-Z0-9]+$/.test(nome)) {
            event.preventDefault();
            alert("Lo username può contenere solo lettere e numeri.");
        }
        if (cognome.length < 3 || cognome.length > 50) {
            event.preventDefault();
            alert("Lo username deve essere lungo tra 3 e 50 caratteri.");
        }
        if (!codFiscale.match(/^[A-Z]{6}[0-9]{2}[A-Z]{1}[0-9]{2}[A-Z]{1}[0-9]{3}[A-Z]{1}$/)) {
            event.preventDefault();
            alert("Il codice fiscale non è valido.");
        }
        $dataMinima = new Date(1900, 0, 1); // 1 gennaio 1900
        if (nascita > $dataMinima) {
            event.preventDefault();
            alert("La data di nascita non può essere futura.");
        }
        if (assunzione > $dataMinima) {
            event.preventDefault();
            alert("La data di assunzione non può essere così vecchia.");
        }
        if (assunzione > new Date()) {
            event.preventDefault();
            alert("La data di assunzione non può essere futura.");
        }
        if (assunzione < nascita) {
            event.preventDefault();
            alert("La data di assunzione non può essere minore della nascita.");
    });


</script>