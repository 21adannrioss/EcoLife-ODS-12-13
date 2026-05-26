<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadístiques - EcoLife</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <script src="/js/estadistiques.js" defer></script>
    <script src="/js/modeFosc.js" defer></script>
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/../../includes/nav.php' ?>

            <span class="etiqueta-ra">RA7 · Comunicació asíncrona · GET</span>
            <h1>Estadístiques</h1>
        </header>

        <div class="contingut-principal">
            
            <!-- Zona d'avís si l'API no respon -->
            <output id="zona-avis-stats"></output>

            <!-- Xifres generals -->
            <section class="seccio">
                <h2>Resum general</h2>
                <div class="graella-3" id="xifres-generals">
                    <article class="targeta">
                        <p>Carregant...</p>
                    </article>
                </div>
            </section>

            <!-- Gràfic per categories -->
            <section class="seccio">
                <h2>Hàbits per categoria</h2>
                <div id="grafica-categories">
                    <p>Carregant...</p>
                </div>
            </section>

            <!-- Taula completa -->
            <section class="seccio">
                <h2>Tots els hàbits</h2>
                <div id="taula-habits">
                    <p>Carregant...</p>
                </div>
            </section>
        </div>
        <?php include_once __DIR__ . '/../../includes/footer.html'; ?>
    </main>
</body>
</html>