<?php
    include_once "db.php";
?>

<head>
<link rel="stylesheet" href="/ADP-VLC/style/login.css"> 
</head>
<body>
    <div id="containerLogin">
        <form method="POST" action="login-action.php">
            <label for="Username">Username</label> <br>
            <input name="Username" type="text"> <br><br>

            <label for="Password">Password</label> <br>
            <input name="Password" type="password"> <br><br>

            <input type="submit" value="Accedi">
        </form>
    </div>
</body>
    

