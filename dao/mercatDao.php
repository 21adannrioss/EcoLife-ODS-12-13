<?php
// Retorna tots els articles ordenats del més recent al més antic
function getAllArticles($db) {
    $resultats = $db->query('SELECT * FROM articles ORDER BY id DESC');
    $articles = [];
    while($row = $resultats->fetchArray(SQLITE3_ASSOC)) {
        $articles[] = $row;
    }
    return $articles;
}

// Retorna un article pel seu ID
function getArticleById($db, $id) {
    $stmt = $db->prepare('SELECT * FROM articles WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $resultat = $stmt->execute();
    return $resultat->fetchArray(SQLITE3_ASSOC);
}

// Crea un article nou i retorna el seu id
function crearArticle($db, $titol, $tipus, $descripcio, $contacte) {
    $data = date('Y-m-d');
    $stmt = $db->prepare('INSERT INTO articles (titol, tipus, descripcio, contacte, data) VALUES (:titol, :tipus, :descripcio, :contacte, :data)');
    $stmt->bindValue(':titol', $titol, SQLITE3_TEXT);
    $stmt->bindValue(':tipus', $tipus, SQLITE3_TEXT);
    $stmt->bindValue(':descripcio', $descripcio, SQLITE3_TEXT);
    $stmt->bindValue(':contacte', $contacte, SQLITE3_TEXT);
    $stmt->bindValue(':data', $data, SQLITE3_TEXT);
    $stmt->execute();
    return $db->lastInsertRowID();
}

// Actualitza un article pel seu id
function actualitzarArticle($id, $titol, $tipus, $descripcio, $contacte) {
    $stmt = $this->db->prepare('UPDATE articles SET titol = ?, tipus = ?, descripcio = ?, contacte = ? WHERE id = ?');
    $stmt->execute([$titol, $tipus, $descripcio, $contacte, $id]);
    
    $stmt2 = $this->db->prepare('SELECT * FROM articles WHERE id = ?');
    $stmt2->execute([$id]);
    return $stmt2->fetch(PDO::FETCH_ASSOC);
}

// Elimina un article pel seu ID
function eliminarArticle($db, $id) {
    $stmt = $db->prepare('DELETE FROM articles WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();
    return $db->changes() > 0;
}