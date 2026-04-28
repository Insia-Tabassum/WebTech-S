<?php
session_start();
session_destroy();

// Optionally clear cookies
setcookie('remember_email', '', time() - 3600, "/");
setcookie('last_login', '', time() - 3600, "/");

header("Location: login.php");
exit;
<?;