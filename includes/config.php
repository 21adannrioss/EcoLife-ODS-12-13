<?php
/*
Creat per solucionar el problema de les rutes relatives en la qual es concatenava la ruta actual amb la nova, generant URLs incorrectes com:
http://localhost:8000/public/view/public/view/reptes.php
*/

// Obté la carpeta arrel del servidor i normalitza les barres
$docRoot = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');

// Obté la carpeta arrel del projecte i normalitza les barres
$projectDir = rtrim(str_replace('\\', '/', dirname(__DIR__)), '/');

// Defineix BASE_URL eliminant la ruta del servidor de la ruta del projecte
define('BASE_URL', str_replace($docRoot, '', $projectDir));