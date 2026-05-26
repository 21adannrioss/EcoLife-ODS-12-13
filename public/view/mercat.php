<?php
include_once __DIR__ . '/../../includes/auth.php';
$usuari = validarToken();
?>
<?php include_once __DIR__ . '/../../includes/meta.php'; ?>
    <title>Mercat d'Intercanvi - EcoLife</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <script src="/js/mercat.js" defer></script>
    <script src="/js/modeFosc.js" defer></script>
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/../../includes/nav.php' ?>

            <h1>Mercat d'Intercanvi</h1>
            <p>Intercanvia, regala o deixa objectes. Allarga la vida dels productes!</p>
        </header>

        <div class="contingut-principal">
            <!-- Explicació de l'economia circular -->
            <section class="seccio">
                <aside class="bloc-info">
                    <strong>Què és l'economia circular?</strong> En lloc de llençar les coses, les compartim, llogem, reutilitzem o reciclem.
                    Cada article que publiques aquí és un producte que no anirà a la brossa!
                </aside>
            </section>

            <!-- Formulari per publicar un article, només per a usuaris autenticats -->
            <section class="seccio">
                <h2>Publicar un article</h2>
                <?php if($usuari): ?>
                <article class="targeta">
                    <form id="formulari-mercat">

                        <div class="grup-camp">
                            <label for="camp-titol">Nom de l'article *</label>
                            <input type="text" id="camp-titol">
                            <p class="missatge-error" id="error-titol">El nom és obligatori.</p>
                        </div>

                        <div class="grup-camp">
                            <label for="camp-tipus">Tipus *</label>
                            <select id="camp-tipus">
                                <option value="">-- Tria el tipus --</option>
                                <option value="intercanvi">Intercanvi (vull alguna cosa a canvi)</option>
                                <option value="regal">Regal (el dono gratis)</option>
                                <option value="préstec">Préstec (el deixo temporalment)</option>
                            </select>
                            <p class="missatge-error" id="error-tipus">Has de triar el tipus.</p>
                        </div>

                        <div class="grup-camp">
                            <label for="camp-descripcio">Descripció *</label>
                            <textarea id="camp-descripcio" rows="3" placeholder="Descriu l'article i el seu estat actual."></textarea>
                            <p class="missatge-error" id="error-descripcio">La descripció és obligatòria.</p>
                        </div>

                        <div class="grup-camp">
                            <label for="camp-contacte">Nom de contacte *</label>
                            <input type="text" id="camp-contacte">
                            <p class="missatge-error" id="error-contacte">El nom de contacte és obligatori.</p>
                        </div>

                        <button type="submit" class="boto boto-verd">Publicar article</button>
                    </form>
                </article>
                <?php else: ?>
                <aside class="bloc-info">
                    <a href="/public/view/login.php">Inicia sessió</a> per publicar articles al mercat.
                </aside>
                <?php endif; ?>
            </section>
            
            <?php if($usuari): ?>
            <!-- Llista d'articles disponibles -->
            <section class="seccio">
                <h2>Articles disponibles</h2>
                <div id="llista-articles"></div>
            </section>

            <!-- Modal editar -->
            <div id="modal-editar-article" class="modal-overlay">
                <div class="modal-contingut">
                    <h3>Editar article</h3>
                    <form id="formulari-editar-article">
                        <div class="grup-camp">
                            <label for="edit-titol">Títol *</label>
                            <input type="text" id="edit-titol" />
                        </div>
                        <div class="grup-camp">
                            <label for="edit-tipus">Tipus *</label>
                            <select id="edit-tipus">
                                <option value="">-- Selecciona --</option>
                                <option value="intercanvi">Intercanvi</option>
                                <option value="regal">Regal</option>
                                <option value="préstec">Préstec</option>
                            </select>
                        </div>
                        <div class="grup-camp">
                            <label for="edit-descripcio">Descripció *</label>
                            <textarea id="edit-descripcio" rows="3"></textarea>
                        </div>
                        <div class="grup-camp">
                            <label for="edit-contacte">Contacte *</label>
                            <input type="text" id="edit-contacte" />
                        </div>
                        <div class="fila-botons">
                            <button type="submit" class="boto boto-verd">Desar canvis</button>
                            <button type="button" class="boto boto-gris" onclick="tancarModalArticle()">Cancel·lar</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php include_once __DIR__ . '/../../includes/footer.html'; ?>  
    </main>

    
</body>
</html>