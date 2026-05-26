<?php
include("../includes/db_connect.php");

$nom = $_POST["usu_nom"] ?? "";
$contrasenya = $_POST["usu_pass"] ?? "";
$confirmar = $_POST["usu_pass_confirm"] ?? "";

// Comprova que s'han enviat dades
if(!$nom || !$contrasenya || !$confirmar) {
    header("Location: /view/registre.php?error=1");
    exit();
}

// Comprova que les contrasenyes coincideixen
if($contrasenya !== $confirmar) {
    header("Location: /view/registre.php?error=2");
    exit();
}

// Comprova que el nom d'usuari no existeixi ja
$stmt = $db->prepare("SELECT usu_nom FROM usuaris WHERE usu_nom = :nom");
$stmt->bindValue(":nom", $nom, SQLITE3_TEXT);
$result = $stmt->execute();
$existent = $result->fetchArray(SQLITE3_ASSOC);

if($existent) {
    header("Location: /view/registre.php?error=3");
    exit();
}

// Inserir el nou usuari amb la contrasenya en MD5
$stmt = $db->prepare("INSERT INTO usuaris (usu_nom, usu_pass, rol) VALUES (:nom, :pass, 'user')");
$stmt->bindValue(":nom", $nom, SQLITE3_TEXT);
$stmt->bindValue(":pass", md5($contrasenya), SQLITE3_TEXT);
$stmt->execute();

// Redirigeix al login amb missatge d'èxit
header("Location: /view/login.php?ok=1");
exit();