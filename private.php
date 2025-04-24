<?php
session_start();

if (isset($_SESSION['UtenteUsername'])) {
    $username = htmlspecialchars($_SESSION['UtenteUsername'], ENT_QUOTES, 'UTF-8');
    echo "<h1>Welcome, $username!</h1>";
} else {
    echo "<h1>Username not found in session.</h1>";
}
?>