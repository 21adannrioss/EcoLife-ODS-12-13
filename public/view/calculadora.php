<?php include_once __DIR__ . '/../../includes/meta.php'; ?>
    <title>Calculadora CO₂ - EcoLife</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/styles.css">
    <script src="<?= BASE_URL ?>/js/calculadora.js" defer></script>
    <script src="<?= BASE_URL ?>/js/modeFosc.js" defer></script>
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/../../includes/nav.php' ?>

            <h1>Calculadora de CO₂</h1>
            <p>Descobreix quanta contaminació generes cada any.</p>
        </header>

        <div class="contingut-principal">
            <aside class="bloc-info bloc-info-mb">
                <strong>Per què és important?</strong> La majoria de persones no saben quines activitats diàries generen més CO₂.
                Conèixer el teu impacte és el primer pas per millorar-lo. L'objectiu és estar per sota de 2,3 tones per any (ODS 13).
            </aside>

            <div class="graella-2">
                <!-- Formulari de la calculadora -->
                <article class="targeta">
                    <h3 class="titol-targeta-mb">Les teves dades</h3>

                    <form id="formulari-calc">

                        <p class="label-categoria">Transport</p>

                        <div class="grup-camp">
                            <label for="cotxe">Km al dia en cotxe privat</label>
                            <input type="number" id="cotxe" value="10" min="0" max="500" />
                        </div>

                        <div class="grup-camp">
                            <label for="trans-pub">Km al dia en transport públic</label>
                            <input type="number" id="trans-pub" value="5" min="0" max="500" />
                        </div>

                        <div class="grup-camp">
                            <label for="vols">Vols internacionals per any</label>
                            <input type="number" id="vols" value="1" min="0" max="50" />
                        </div>

                        <p class="label-categoria-mt">Energia a casa</p>

                        <div class="grup-camp">
                            <label for="electricitat">kWh d'electricitat al mes</label>
                            <input type="number" id="electricitat" value="150" min="0" />
                        </div>

                        <div class="grup-camp">
                            <label for="gas">Mesos de calefacció de gas per any</label>
                            <input type="number" id="gas" value="4" min="0" max="12" />
                        </div>

                        <p class="label-categoria-mt">Alimentació</p>

                        <div class="grup-camp">
                            <label for="carn">Dies per setmana que menges carn</label>
                            <input type="number" id="carn" value="4" min="0" max="7" />
                            <p class="missatge-error" id="error-carn">Ha de ser un número entre 0 i 7.</p>
                        </div>

                        <button type="submit" class="boto boto-verd boto-complet">Calcular la meva petjada</button>
                    </form>
                </article>

                <!-- Resultat del càlcul -->
                <div id="zona-resultat">
                    <article class="targeta zona-resultat-buit">
                        <p class="emoji-resultat">🌍</p>
                        <p class="text-secundari">Emplena el formulari per veure el resultat.</p>
                    </article>
                </div>
            </div>
        </div>
        <?php include_once __DIR__ . '/../../includes/footer.html'; ?>
    </main>
</body>
</html>