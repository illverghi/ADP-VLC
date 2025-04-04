<?php
    include_once "db.php";
    
    if ($_GET["err"] == 1) {
        echo "Username o Password non validi!";
    }

?>
<head>
<link rel="stylesheet" href="login.php"> 
</head>
<form method="POST" action="login-action.php">
    <label for="Username">Username</label> <br>
    <input name="Username" type="text"> <br><br>

    <label for="Password">Password</label> <br>
    <input name="Password" type="password"> <br><br>

    <input type="submit" value="Accedi">
</form>
