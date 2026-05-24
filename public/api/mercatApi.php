<?php
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../dao/mercatDao.php';

header('Content-Type: application/json');

// Obté paràmetres GET si existeixen
$id = isset($_GET['id'])? (int)$_GET['id']: null;

$input = json_decode(file_get_contents('php://input'), true);

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Retorna tots els articles
        $articles = getAllArticles($db);
        echo json_encode($articles);
        break;

    case 'POST':
        // Comprova que cap camp estigui buit
        $titol = $input['titol']?? '';
        $tipus = $input['tipus']?? '';
        $descripcio = $input['descripcio']?? '';
        $contacte = $input['contacte']?? '';

        if(!$titol || !$tipus || !$descripcio || !$contacte) {
            http_response_code(400);
            echo json_encode(['error' => 'Falten camps obligatoris']);
            break;
        }

        // Crea l'article i retorna el registre creat
        $nouId = crearArticle($db, $titol, $tipus, $descripcio, $contacte);
        $article = getArticleById($db, $nouId);

        http_response_code(201);
        echo json_encode($article);
        break;

    case 'DELETE':
        // Cal estar autenticat per eliminar
        $usuari = validarToken();
        if(!$usuari) {
            http_response_code(401);
            echo json_encode(['error' => 'Cal iniciar sessió per eliminar articles']);
            break;
        }

        if(!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Cal indicar id']);
            break;
        }

        $eliminat = eliminarArticle($db, $id);

        if(!$eliminat) {
            http_response_code(404);
            echo json_encode(['error' => 'Article no trobat']);
            break;
        }

        echo json_encode(['missatge' => 'Article eliminat']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Mètode HTTP que no es permès.']);
        break;
}