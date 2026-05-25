<?php
require_once __DIR__ . '/../public/includes/db_connect.php';

// Usuaris
$db->exec("
CREATE TABLE IF NOT EXISTS usuaris (
    usu_nom TEXT PRIMARY KEY,
    usu_pass TEXT NOT NULL,
    rol TEXT NOT NULL DEFAULT 'usuari'
)
");

// Hàbits
$db->exec("
CREATE TABLE IF NOT EXISTS habits (
    id INTEGER PRIMARY KEY,
    nom TEXT NOT NULL,
    categoria TEXT NOT NULL,
    co2 REAL NOT NULL,
    data DATE NOT NULL
)
");

// Registres
$db->exec("
CREATE TABLE IF NOT EXISTS registres (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usu_nom TEXT NOT NULL,
    habit_id INTEGER NOT NULL,
    data_registre TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (usu_nom) REFERENCES usuaris(usu_nom),
    FOREIGN KEY (habit_id) REFERENCES habits(id)
)
");

//Articles
$db->exec("
    CREATE TABLE IF NOT EXISTS articles (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        titol TEXT NOT NULL,
        tipus TEXT NOT NULL,
        descripcio TEXT NOT NULL,
        contacte TEXT NOT NULL,
        data TEXT NOT NULL
    )
");



// Insert usuaris
$resUsuaris = $db->querySingle("SELECT COUNT(*) FROM usuaris");

if($resUsuaris == 0) {
    $db->exec("
    INSERT INTO usuaris (usu_nom, usu_pass, rol) VALUES
    ('Adan', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'admin'),
    ('Carlos', '200820e3227815ed1756a6b531e7e0d2', 'user')
    "); // asd123, qwe123
}

// Insert hàbits
$resHabits = $db->querySingle("SELECT COUNT(*) FROM habits");

if($resHabits == 0) {
    $db->exec("
    INSERT INTO habits (id, nom, categoria, co2, data) VALUES
    (1, 'Anar a l''escola a peu', 'transport', 0.9, '2026-03-10'),
    (2, 'Portar ampolla reutilitzable', 'residus', 0.3, '2026-03-12'),
    (3, 'No menjar carn els dimecres', 'alimentació', 1.8, '2026-03-15'),
    (4, 'Apagar els llums al sortir', 'energia', 0.5, '2026-03-17'),
    (5, 'Comprar roba de segona mà', 'compres', 2.2, '2026-03-20'),
    (6, 'Anar en bicicleta a la feina', 'transport', 1.4, '2026-03-22'),
    (7, 'Separar el reciclatge correctament', 'residus', 0.6, '2026-03-23'),
    (8, 'Menjar dieta vegetariana un dia a la setmana', 'alimentació', 2.5, '2026-03-25'),
    (9, 'Dutxa en lloc de bany', 'energia', 0.8, '2026-03-26'),
    (10, 'Reparar roba en comptes de llençar-la', 'compres', 1.9, '2026-03-28'),
    (11, 'Usar transport públic per anar al centre', 'transport', 1.1, '2026-04-01'),
    (12, 'Compostar restes orgàniques', 'residus', 1.2, '2026-04-02'),
    (13, 'Comprar fruita i verdura de proximitat', 'alimentació', 1.0, '2026-04-03'),
    (14, 'Desconnectar aparells de la xarxa elèctrica', 'energia', 0.4, '2026-04-04'),
    (15, 'Evitar bosses de plàstic al supermercat', 'residus', 0.2, '2026-04-05'),
    (16, 'Compartir cotxe per anar a la muntanya', 'transport', 2.0, '2026-04-07'),
    (17, 'Reduir el consum de làctics', 'alimentació', 1.6, '2026-04-08'),
    (18, 'Instal·lar bombetes LED a casa', 'energia', 0.7, '2026-04-09'),
    (19, 'Comprar productes a granel', 'compres', 0.9, '2026-04-10'),
    (20, 'Fer servir mocadors de tela en lloc de paper', 'residus', 0.3, '2026-04-11'),
    (21, 'No agafar l''ascensor fins al 3r pis', 'energia', 0.2, '2026-04-12'),
    (22, 'Menjar llegums dues vegades per setmana', 'alimentació', 1.3, '2026-04-14'),
    (23, 'Anar a peu als recats del barri', 'transport', 0.6, '2026-04-15'),
    (24, 'Regalar joguines en lloc de comprar-ne', 'compres', 1.7, '2026-04-16'),
    (25, 'Reutilitzar pots de vidre per guardar aliments', 'residus', 0.5, '2026-04-17'),
    (26, 'Rentar la roba a 30 graus', 'energia', 0.6, '2026-04-18'),
    (27, 'Plantar herbes aromàtiques a casa', 'alimentació', 0.4, '2026-04-20'),
    (28, 'Subscripció a un grup de consum ecològic', 'compres', 2.8, '2026-04-21'),
    (29, 'Usar el patinet elèctric per desplaçaments curts', 'transport', 0.8, '2026-04-22'),
    (30, 'Imprimir a doble cara sempre', 'residus', 0.2, '2026-04-23')
    ");
}

// Insert hàbits
$resArticles = $db->querySingle("SELECT COUNT(*) FROM articles");

if($resArticles == 0) {
$db->exec("
    INSERT INTO articles (titol, tipus, descripcio, contacte, data) VALUES
    ('Bicicleta de muntanya', 'intercanvi', 'Bicicleta en bon estat, canvis Shimano. Busco patinete elèctric o similar.', 'Pere - 612 345 678', '2026-03-10'),
    ('Llibres de text 1r ESO', 'regal', 'Conjunt complet de llibres de primer d''ESO, bon estat. Els regalo, no els necessito.', 'Marta - marta@email.com', '2026-03-12'),
    ('Taula de fusta', 'intercanvi', 'Taula de menjador per a 4 persones. Busco cadires o moble de televisió.', 'Joan - 634 567 890', '2026-03-15'),
    ('Roba de bebè 0-6 mesos', 'regal', 'Bossa amb roba de bebè en molt bon estat. Tot net i en perfectes condicions.', 'Laura - 698 234 567', '2026-03-17'),
    ('Patins en línia talla 38', 'préstec', 'Patins per a l''estiu, els deixo un mes. Deixar fiança simbòlica.', 'Carlos - carlos@email.com', '2026-03-20'),
    ('Cafetera italiana', 'regal', 'Cafetera moka de 6 tasses, funciona perfectament. Me n''han regalat una nova.', 'Núria - 611 789 012', '2026-03-22'),
    ('Tenda de campanya 4 places', 'préstec', 'Tenda per a cap de setmana o setmana. Bon estat, inclou sacs de terra.', 'Andreu - 645 321 098', '2026-03-25'),
    ('Monitor 24 polzades', 'intercanvi', 'Monitor Full HD, HDMI i VGA. Busco teclat mecànic o auriculars.', 'Sofia - sofia@email.com', '2026-03-28'),
    ('Llibres de cuina', 'regal', 'Col·lecció de 8 llibres de cuina mediterrània i vegana. Molt bon estat.', 'Rosa - 622 456 789', '2026-04-01'),
    ('Escúter elèctric', 'intercanvi', 'Patinete elèctric 25 km/h, autonomia 20 km. Busco bicicleta o consola.', 'Marc - 677 890 123', '2026-04-03')
    ");
}
?>