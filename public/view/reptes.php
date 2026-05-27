<?php include_once __DIR__ . '/../../includes/meta.php'; ?>
    <title>Reptes - EcoLife</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/styles.css">
    <script src="<?= BASE_URL ?>/js/modeFosc.js" defer></script>
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/../../includes/nav.php' ?>

            <h1>Reptes Ambientals</h1>
            <p>Problemes concrets relacionats amb els ODS 12 i 13, i com EcoLife hi respon.</p>
        </header>

        <div class="contingut-principal">
            <!-- Problemes identificats -->
            <section class="seccio">
                <h2>Problemes que hem identificat</h2>
                <div class="graella-2">
                    <article class="targeta">
                        <p class="icona-gran">🏭</p>
                        <h3>Excés d'emissions de gasos</h3>
                        <p class="text-secundari-espaiat">
                            La majoria de persones no saben quines activitats quotidianes generen més emissions de gasos d'efecte hivernacle.
                            Anar en cotxe, agafar avions o menjar carn cada dia té un impacte molt gran.
                        </p>
                        <aside class="bloc-info"><strong>Resposta EcoLife:</strong> La calculadora de CO₂ fa visible l'impacte de cada acció diària.</aside>
                    </article>

                    <article class="targeta">
                        <p class="icona-gran">🗑️</p>
                        <h3>Consum lineal: comprar i llençar</h3>
                        <p class="text-secundari-espaiat">
                            El model de consum actual és "prendre, fabricar i llençar". Això genera 2.000 milions de tones de residus sòlids per any.
                            La majoria de productes s'abandonen quan encara podrien tenir una segona vida.
                        </p>
                        <aside class="bloc-info">
                            <strong>Resposta EcoLife:</strong> El mercat d'intercanvi permet donar una nova vida als objectes.
                        </aside>
                    </article>

                    <article class="targeta">
                        <p class="icona-gran">🌊</p>
                        <h3>Excés de plàstic d'un sol ús</h3>
                        <p class="text-secundari-espaiat">
                            Més de 8 milions de tones de plàstic acaben als oceans cada any.
                            Bosses, pajites i embolcalls innecessaris contaminen els ecosistemes marins i entren a la cadena alimentària.
                        </p>
                        <aside class="bloc-info">
                            <strong>Resposta EcoLife:</strong> Hàbits de reducció de plàstic amb seguiment del CO₂ estalviat.
                        </aside>
                    </article>

                    <article class="targeta">
                        <p class="icona-gran">🍽️</p>
                        <h3>Malbaratament d'aliments</h3>
                        <p class="text-secundari-espaiat">
                            931 milions de tones d'aliments es llencen cada any mentre milions de persones passen gana.
                            El menjar als abocadors genera metà, un gas molt més contaminant que el CO₂.
                        </p>
                        <aside class="bloc-info">
                            <strong>Resposta EcoLife:</strong> Hàbits de "cuina zero residus" i conscienciació de l'impacte del malbaratament.
                        </aside>
                    </article>
                </div>
            </section>

            <!-- Com EcoLife ajuda -->
            <section class="seccio">
                <h2>Com EcoLife minimitza aquests problemes</h2>
                <aside class="bloc-info">
                    <strong>1. Mesurar per millorar:</strong> La calculadora i el registre de hàbits fan visible l'impacte real de cada acció quotidiana.
                </aside>
                <aside class="bloc-info">
                    <strong>2. Economia circular:</strong> El mercat d'intercanvi allarga la vida dels productes i evita que acabin als abocadors.
                </aside>
                <aside class="bloc-info">
                    <strong>3. Canvi d'hàbits:</strong> Cada hàbit registrat representa un canvi real en el comportament de l'usuari.
                </aside>
                <aside class="bloc-info">
                    <strong>4. Impacte col·lectiu:</strong> Les estadístiques mostren el CO₂ total estalviat, generant motivació compartida.
                </aside>
            </section>
        </div>
        <?php include_once __DIR__ . '/../../includes/footer.html'; ?>
    </main>
</body>
</html>