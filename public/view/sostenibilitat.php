<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sostenibilitat - EcoLife</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/modeFosc.js" defer></script>
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/../includes/nav.php' ?>

            <span class="etiqueta-ra">RA3 + RA5 · Bones pràctiques i impacte mediambiental</span>
            <h1>Sostenibilitat en el Desenvolupament</h1>
            <p>Com hem aplicat bones pràctiques durant la creació d'EcoLife.</p>
        </header>

        <div class="contingut-principal">
            <!-- RA5: Tècniques de programació eficient -->
            <section class="seccio">
                <h2>RA5 - Com hem fet la web més eficient</h2>
                <p class="text-secundari-espaiat">
                    La tecnologia també contamina. Els servidors consumeixen energia i les webs pesades fan gastar més bateria i dades.
                    Per això hem aplicat tècniques per fer EcoLife el més lleuger i eficient possible.
                </p>

                <div class="graella-2">
                    <article class="targeta">
                        <h4>Sense imatges pesades</h4>
                        <p class="text-secundari">
                            Hem usat emojis Unicode com a icones, que ocupen 0 bytes de descàrrega extra.
                            Fer servir una imatge JPG per a cada icona hauria sumat centenars de KB.
                        </p>
                    </article>

                    <article class="targeta">
                        <h4>Peticions a l'API mínimes</h4>
                        <p class="text-secundari">
                            El frontend fa una sola petició GET per pàgina en carregar.
                            Els filtres s'apliquen localment a les dades ja rebudes, sense fer noves peticions al
                            servidor.
                            Menys peticions = menys energia consumida.
                        </p>
                    </article>

                    <article class="targeta">
                        <h4>Codi senzill i reutilitzable</h4>
                        <p class="text-secundari">
                            La navbar i els estils es reutilitzen a totes les pàgines gràcies a fitxers compartits.
                            Hem evitat repetir codi per facilitar el manteniment i reduir el pes del projecte.
                        </p>
                    </article>


                    <article class="targeta">
                        <h4>Mode Fosc</h4>
                        <p class="text-secundari">
                            EcoLife té un botó per activar el mode fosc. En pantalles OLED els píxels
                            negres s'apaguen completament, estalviant fins al 60% d'energia.
                            La preferència es guarda al navegador perquè no calgui tornar-la a activar.
                        </p>
                    </article>

                    <article class="targeta">
                        <h4>Sense llibreries innecessàries</h4>
                        <p class="text-secundari">
                            El frontend és JavaScript pur (vanilla JS), sense React, Vue ni jQuery.
                            Menys KB descarregats significa menys energia consumida per l'usuari.
                        </p>
                    </article>
                </div>
            </section>

            <!-- RA3: Hàbits sostenibles com a desenvolupador -->
            <section class="seccio">
                <h2>RA3 - Els meus hàbits sostenibles com a programador/a</h2>
                <p class="text-secundari-espaiat">
                    No només importa que l'aplicació sigui sostenible, sinó com jo, com a persona que programa,
                    treballo cada dia per minimitzar el meu impacte.
                </p>

                <div class="graella-2">
                    <div>
                        <aside class="bloc-info">
                            <strong>Eines col·laboratives al núvol</strong><br />
                            He usat GitHub i Google Drive per compartir codi i documentació.
                            Això evita haver de desplaçar-me i imprimir res en paper.
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
                            <strong>Cerques eficients al navegador</strong><br />
                            Tancar les pestanyes innecessàries redueix el consum de RAM i CPU,
                            estalviant energia mentre programo.
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
        <?php include_once __DIR__ . '/../includes/footer.html'; ?>
    </main>
</body>
</html>