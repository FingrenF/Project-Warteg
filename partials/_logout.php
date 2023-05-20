<?php

session_start();
echo "Logging you out. Please wait...";
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
unset($_SESSION["id_user"]);

// session_unset();
// session_destroy();

header("location: /Project Warteg/index.php");
?>