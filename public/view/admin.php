<?php
include_once __DIR__ . '/../../includes/auth.php';
$usuari = validarToken();

// Si no és admin, redirigeix a l'inici
if(!$usuari || $usuari['rol'] !== 'admin') {
    header('Location: /public/view/index.php');
    exit();
}
?>
<?php include_once __DIR__ . '/../../includes/meta.php'; ?>
    <title>Panel Admin - EcoLife</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/styles.css">
    <script src="<?= BASE_URL ?>/js/modeFosc.js" defer></script>
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/../../includes/nav.php' ?>
            <h1>Panel Admin</h1>
            <p>Benvingut, <?= htmlspecialchars($usuari['nom']) ?>. Tens accés complet a la gestió.</p>
        </header>

        <div class="contingut-principal">
            <!-- Gestió d'usuaris -->
            <section class="seccio">
                <h2>Usuaris registrats</h2>
                <div id="llista-usuaris">
                    <?php
                    include_once __DIR__ . '/../../includes/db_connect.php';
                    $result = $db->query("SELECT usu_nom, rol FROM usuaris ORDER BY rol DESC, usu_nom ASC");

                    echo '<div class="taula-responsive"><table>';
                    echo '<thead><tr><th>Usuari</th><th>Rol</th></tr></thead>';
                    echo '<tbody>';
                    while($fila = $result->fetchArray(SQLITE3_ASSOC)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($fila['usu_nom']) . '</td>';
                        echo '<td>' . htmlspecialchars($fila['rol']) . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table></div>';
                    ?>
                </div>
            </section>

            <!-- Gestió d'articles del mercat -->
            <section class="seccio">
                <h2>Articles del Mercat</h2>
                <div id="llista-articles-admin">
                    <?php
                    $result2 = $db->query("SELECT * FROM articles ORDER BY id DESC");

                    echo '<div class="taula-responsive"><table>';
                    echo '<thead><tr><th>Títol</th><th>Tipus</th><th>Contacte</th><th>Data</th><th>Accions</th></tr></thead>';
                    echo '<tbody>';
                    while($fila = $result2->fetchArray(SQLITE3_ASSOC)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($fila['titol']) . '</td>';
                        echo '<td>' . htmlspecialchars($fila['tipus']) . '</td>';
                        echo '<td>' . htmlspecialchars($fila['contacte']) . '</td>';
                        echo '<td>' . $fila['data'] . '</td>';
                        echo '<td>';
                        echo '<button class="boto boto-perill" onclick="eliminarArticleAdmin(' . $fila['id'] . ')">Eliminar</button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table></div>';
                    ?>
                </div>
            </section>

            <!-- Gestió d'hàbits -->
            <section class="seccio">
                <h2>Hàbits de la comunitat</h2>
                <div id="llista-habits-admin">
                    <?php
                    $result3 = $db->query("SELECT * FROM habits ORDER BY id ASC");

                    echo '<div class="taula-responsive"><table>';
                    echo '<thead><tr><th>Nom</th><th>Categoria</th><th>CO₂</th><th>Data</th></tr></thead>';
                    echo '<tbody>';
                    while($fila = $result3->fetchArray(SQLITE3_ASSOC)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($fila['nom']) . '</td>';
                        echo '<td>' . htmlspecialchars($fila['categoria']) . '</td>';
                        echo '<td style="color:#2e7d32;">' . $fila['co2'] . ' kg</td>';
                        echo '<td style="color:#777;">' . $fila['data'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table></div>';
                    ?>
                </div>
            </section>

        </div>
        <?php include_once __DIR__ . '/../../includes/footer.html'; ?>
    </main>

    <script>
        // Eliminar un article des del panel admin
        async function eliminarArticleAdmin(id) {
            if(!confirm('Vols eliminar aquest article?')) return

            const res = await fetch('/api/mercatApi.php?id=' + id, {method: 'DELETE'})

            if(res.ok) {
                // Recarrega la pàgina per actualitzar la taula
                location.reload()
            } else {
                alert("Error en eliminar l'article.")
            }
        }
    </script>
</body>
</html>