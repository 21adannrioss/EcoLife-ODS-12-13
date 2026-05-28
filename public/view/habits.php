<?php
include_once __DIR__ . '/../../includes/auth.php';
$usuari = validarToken();

include_once __DIR__ . '/../../includes/meta.php';

// Cal estar autenticat
if(!$usuari) {
    header('Location: ' . BASE_URL . '/public/view/login.php');
    exit();
}
?>
    <title>Hàbits - EcoLife</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/styles.css">
    <script src="<?= BASE_URL ?>/js/habits.js" defer></script>
    <script src="<?= BASE_URL ?>/js/modeFosc.js" defer></script>
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/../../includes/nav.php' ?>
            <h1>Gestió de Hàbits</h1>
            <p>Afegeix, consulta, edita i elimina els teus hàbits sostenibles.</p>
        </header>

        <div class="contingut-principal">
            <div id="zona-avis"></div>

            <section class="seccio">
                <h2>Afegir un nou hàbit</h2>
                <article class="targeta">
                    <form id="formulari-habit">
                        <div class="grup-camp">
                            <label for="camp-nom">Nom del hàbit *</label>
                            <input type="text" id="camp-nom"/>
                            <p class="missatge-error" id="error-nom">El nom és obligatori i ha de tenir mínim 3 caràcters.</p>
                        </div>
                        <div class="grup-camp">
                            <label for="camp-categoria">Categoria *</label>
                            <select id="camp-categoria">
                                <option value="">-- Tria una categoria --</option>
                                <option value="transport">Transport</option>
                                <option value="residus">Residus</option>
                                <option value="alimentació">Alimentació</option>
                                <option value="energia">Energia</option>
                                <option value="compres">Compres</option>
                            </select>
                            <p class="missatge-error" id="error-categoria">Has de triar una categoria.</p>
                        </div>
                        <div class="grup-camp">
                            <label for="camp-co2">CO₂ estalviat (kg) - opcional</label>
                            <input type="number" id="camp-co2" placeholder="0.5" step="0.1" min="0" max="100" />
                            <p class="missatge-error" id="error-co2">Ha de ser un número entre 0 i 100.</p>
                        </div>
                        <button type="submit" class="boto boto-verd">Afegir hàbit</button>
                    </form>
                </article>
            </section>

            <section class="seccio">
                <h2>Llista d'hàbits</h2>
                <div id="llista-habits">
                    <p>Carregant dades...</p>
                </div>
            </section>

            <div class="fons-modal" id="modal-editar">
                <article class="modal">
                    <h3>Editar hàbit</h3>
                    <form id="formulari-editar">
                        <div class="grup-camp">
                            <label for="edit-nom">Nom *</label>
                            <input type="text" id="edit-nom">
                            <p class="missatge-error" id="error-edit-nom">El nom és obligatori i ha de tenir mínim 3 caràcters.</p>
                        </div>
                        <div class="grup-camp">
                            <label for="edit-categoria">Categoria *</label>
                            <select id="edit-categoria">
                                <option value="transport">Transport</option>
                                <option value="residus">Residus</option>
                                <option value="alimentació">Alimentació</option>
                                <option value="energia">Energia</option>
                                <option value="compres">Compres</option>
                            </select>
                        </div>
                        <div class="grup-camp">
                            <label for="edit-co2">CO₂ estalviat (kg)</label>
                            <input type="number" id="edit-co2" step="0.1" min="0">
                            <p class="missatge-error" id="error-edit-co2">Ha de ser un número entre 0 i 100.</p>
                        </div>
                        <div class="fila-botons">
                            <button type="submit" class="boto boto-verd">Desar canvis</button>
                            <button type="button" class="boto boto-gris" onclick="tancarModal()">Cancel·lar</button>
                        </div>
                    </form>
                </article>
            </div>
        </div>
        <?php include_once __DIR__ . '/../../includes/footer.html'; ?>
    </main>
</body>
</html>