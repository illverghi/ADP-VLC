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
            <label for="username">Username</label> <br>
            <input name="username" type="text"> <br><br>
            <label for="password">Password</label> <br>
            <div style="position: relative; width: 100%;">
                <input type="password" id="password" name="password">
                <img id="togglePassword" src="/ADP-VLC/style/drawable/bee_hidden.png" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);
                    width: 24px; height: 24px; cursor: pointer;"></img>
            </div>
            <div class="submit-container">
                <div>
                    <a href="registration.php" class="register-button">Registrati</a>
                </div>
                <input type="submit" value="Accedi">
            </div>
        </form>
    </div>
</body>
<script>
document.getElementById("togglePassword").addEventListener("click", function () {
    const passwordField = document.getElementById("password");
    const isPassword = passwordField.type === "password";
    
    passwordField.type = isPassword ? "text" : "password";
    this.src = isPassword ? "/ADP-VLC/style/drawable/bee_visible.png" : "/ADP-VLC/style/drawable/bee_hidden.png";
});
</script>
</html>