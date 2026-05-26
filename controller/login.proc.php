<?php
include("../includes/db_connect.php");

$nom = $_POST["usu_nom"]?? "";
$contrasenya = $_POST["usu_pass"]?? "";

if($nom && $contrasenya) {
    $stmt = $db->prepare("SELECT * FROM usuaris WHERE usu_nom = :nom");
    $stmt->bindValue(":nom", $nom, SQLITE3_TEXT);
    $result = $stmt->execute();
    $usuari = $result->fetchArray(SQLITE3_ASSOC);

    if($usuari && $usuari["usu_pass"] === md5($contrasenya)) {
        $header = base64_encode(json_encode(["alg" => "HS256", "typ" => "JWT"]));
        $payload = base64_encode(json_encode([
            "nom" => $usuari["usu_nom"],
            "rol" => $usuari["rol"],
            "exp" => time() + 3600
        ]));
        $clau_secreta = "clauSuperSecreta123";
        $signatura = base64_encode(hash_hmac("sha256", "$header.$payload", $clau_secreta, true));
        $token = "$header.$payload.$signatura";

        setcookie("token", $token, time() + 3600, "/");
        header("Location: /index.php");
        exit();
    } else{
        header("Location: /view/login.php?error=1");
        exit();
    }
} else{
    header("Location: /view/login.php?error=2");
    exit();
}