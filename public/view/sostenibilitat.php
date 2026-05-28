<?php include_once __DIR__ . '/../../includes/meta.php'; ?>
    <title>Sostenibilitat - EcoLife</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/styles.css">
    <script src="<?= BASE_URL ?>/js/modeFosc.js" defer></script>
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/../../includes/nav.php' ?>

            <h1>Sostenibilitat en el Desenvolupament</h1>
            <p>Com he aplicat bones pràctiques durant la creació d'EcoLife.</p>
        </header>

        <div class="contingut-principal">
            <!-- RA5: Tècniques de programació eficient -->
            <section class="seccio">
                <h2>Com he fet la web més eficient</h2>
                <p class="text-secundari-espaiat">
                    La tecnologia també contamina. Els servidors consumeixen energia i les webs pesades fan gastar més bateria i dades.
                    Per això he aplicat tècniques per fer EcoLife el més lleuger i eficient possible.
                </p>

                <div class="graella-2">
                    <article class="targeta">
                        <h4>Peticions a l'API mínimes</h4>
                        <p class="text-secundari">
                            Tant l'API de hàbits (Node.js/Express) com la del mercat (PHP) retornen totes les dades en una sola
                            petició GET en carregar la pàgina. Els filtres i ordenacions s'apliquen localment sobre l'array
                            ja rebut, sense generar noves peticions al servidor.
                            Menys peticions = menys energia consumida.
                        </p>
                    </article>

                    <article class="targeta">
                        <h4>Arquitectura separada i reutilitzable</h4>
                        <p class="text-secundari">
                            El projecte segueix un patró DAO/API per al mòdul de mercat (PHP) i una API REST amb Express per als hàbits.
                            La navbar, els estils i la connexió a la base de dades SQLite es reutilitzen a totes les pàgines,
                            evitant duplicar codi i reduint el pes global del projecte.
                        </p>
                    </article>

                    <article class="targeta">
                        <h4>Mode Fosc</h4>
                        <p class="text-secundari">
                            EcoLife té un botó per activar el mode fosc, implementat amb JavaScript pur a
                            modeFosc.js. En pantalles OLED els píxels negres s'apaguen completament,
                            estalviant fins al 60% d'energia. La preferència es guarda al navegador perquè no calgui tornar-la a activar.
                        </p>
                    </article>

                    <article class="targeta">
                        <h4>Sense llibreries innecessàries al frontend</h4>
                        <p class="text-secundari">
                            Tot el frontend és JavaScript pur (vanilla JS): habits.js, mercat.js,
                            calculadora.js, estadistiques.js... cap d'ells importa React, Vue ni jQuery.
                            Menys KB descarregats significa menys energia consumida per l'usuari.
                        </p>
                    </article>

                    <article class="targeta">
                        <h4>Base de dades lleugera: SQLite</h4>
                        <p class="text-secundari">
                            En lloc d'un servidor de base de dades separat, EcoLife utilitza SQLite, accessible tant des de PHP com des de
                            Node.js amb better-sqlite3. Això elimina processos addicionals i redueix el consum de recursos del servidor.
                        </p>
                    </article>

                    <article class="targeta">
                        <h4>Validació al frontend i al backend</h4>
                        <p class="text-secundari">
                            Els formularis (hàbits, mercat, calculadora) validen els camps al navegador abans d'enviar
                            qualsevol petició. L'API també valida al servidor. Això evita peticions incorrectes innecessàries
                            i estalvia cicles de processament.
                        </p>
                    </article>
                </div>
            </section>

            <!-- RA3: Hàbits sostenibles com a desenvolupador -->
            <section class="seccio">
                <h2>Els meus hàbits sostenibles com a programador</h2>
                <p class="text-secundari-espaiat">
                    No només importa que l'aplicació sigui sostenible, sinó com jo, com a persona que programa,
                    treballo cada dia per minimitzar el meu impacte.
                </p>

                <div class="graella-2">
                    <div>
                        <aside class="bloc-info">
                            <strong>Control de versions amb Git i GitHub</strong><br />
                            Tot el projecte s'ha gestionat amb Git i pujat a GitHub.
                            Això evita duplicar fitxers, fer còpies en paper i facilita la col·laboració sense desplaçaments.
                        </aside>
                        <aside class="bloc-info">
                            <strong>Apagar l'ordinador, no deixar-lo en suspensió</strong><br />
                            Al acabar de treballar, apago l'ordinador completament.
                            La suspensió consumeix energia innecessàriament durant hores.
                        </aside>
                        <aside class="bloc-info">
                            <strong>Zero impressions en paper</strong><br />
                            Tot el codi, apunts i documentació d'aquest projecte s'han gestionat digitalment.
                            No he imprès ni un sol full.
                        </aside>
                    </div>
                    <div>
                        <aside class="bloc-info">
                            <strong>Tancar pestanyes i processos innecessaris</strong><br />
                            Mentre desenvolupa el servidor Node.js i el servidor PHP alhora,
                            mantenir obertes només les pestanyes necessàries redueix el consum de RAM i CPU.
                        </aside>
                        <aside class="bloc-info">
                            <strong>Treballar en mode fosc a l'editor</strong><br />
                            L'editor de codi (VS Code) s'ha fet servir en mode fosc durant tot el projecte.
                            En pantalles OLED, el mode fosc estalvia fins al 60% d'energia.
                        </aside>
                        <aside class="bloc-info">
                            <strong>Anar a peu o en bici a l'institut</strong><br />
                            Durant el desenvolupament d'aquest projecte he intentat evitar el cotxe
                            en els desplaçaments curts.
                        </aside>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once __DIR__ . '/../../includes/footer.html'; ?>
    </main>
</body>
</html>