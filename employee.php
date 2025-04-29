<?php
session_start();
include_once "db.php";
echo "<h1>Welcome, employee n. " . $_SESSION['cf'] . "!</h1>";