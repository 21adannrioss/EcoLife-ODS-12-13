<?php
include_once __DIR__ . "/../includes/config.php";
// Eliminar la cookie del token posant una data d'expiració passada
setcookie('token', '', time() - 3600, '/');

header("Location: " . BASE_URL . "/public/view/index.php");
exit();
?>