<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ODS - EcoLife STATIC</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/../includes/nav.php' ?>

            <span class="etiqueta-ra">RA1 · Identificació ASG i marcs internacionals</span>
            <h1>ODS 12 i ODS 13</h1>
            <p>Els Objectius de Desenvolupament Sostenible que guien EcoLife</p>
        </header>

        <div class="contingut-principal">
            <!-- Impacte ASG -->
            <section class="seccio">
                <h2>Impacte ASG del nostre projecte</h2>
                <p class="text-secundari-espaiat">
                    ASG vol dir <strong>Ambiental, Social i Governança</strong>. Tota acció té impacte en aquests tres nivells.
                </p>
                <aside class="bloc-info">
                    <strong>Ambiental:</strong> EcoLife ajuda a reduir emissions de CO₂ gràcies al registre d'hàbits i la calculadora de petjada de carboni.
                </aside>
                <aside class="bloc-info">
                    <strong>Social:</strong> La plataforma educa i consciencia les persones sobre el consum responsable i l'intercanvi de productes.
                </aside>
                <aside class="bloc-info">
                    <strong>Governança:</strong> L'aplicació és transparent amb les dades i no ven informació personal dels usuaris.
                </aside>
            </section>

            <!-- ODS 13 -->
            <section class="seccio">
                <h2>ODS 13 - Acció pel Clima</h2>
                <p class="text-secundari-espaiat">
                    El canvi climàtic és causat per les activitats humanes. Per limitar l'escalfament a 1,5°C per sobre
                    dels nivells preindustrials,
                    les emissions globals han de reduir-se gairebé a la meitat per al 2030.
                </p>
                <div class="graella-2">
                    <article class="targeta">
                        <h4 class="titol-targeta">Metes principals</h4>
                        <ul class="llista-punts">
                            <li><strong>13.1</strong> - Enfortir la resiliència davant desastres naturals.</li>
                            <li><strong>13.2</strong> - Incorporar el canvi climàtic a les polítiques nacionals.</li>
                            <li><strong>13.3</strong> - Millorar l'educació i conscienciació sobre el clima.</li>
                        </ul>
                    </article>
                    <article class="targeta">
                        <h4 class="titol-targeta">Com hi contribueix EcoLife</h4>
                        <ul class="llista-neta">
                            <li>Calculadora de petjada de carboni</li>
                            <li>Registre de hàbits amb estalvi de CO₂</li>
                            <li>Informació educativa sobre el clima</li>
                            <li>Estadístiques de l'impacte acumulat</li>
                        </ul>
                    </article>
                </div>
            </section>

            <!-- ODS 12 -->
            <section class="seccio">
                <h2>ODS 12 - Consum i Producció Responsables</h2>
                <p class="text-secundari-espaiat">
                    Cada any es malbaraten 931 milions de tones d'aliments al món.
                    Si la població mundial creix fins als 9.800 milions el 2050, podrien fer falta l'equivalent a tres
                    planetes
                    per mantenir els estils de vida actuals.
                </p>
                <div class="graella-2">
                    <article class="targeta">
                        <h4 class="titol-targeta">Metes principals</h4>
                        <ul class="llista-punts">
                            <li><strong>12.2</strong> - Gestió sostenible dels recursos naturals.</li>
                            <li><strong>12.5</strong> - Reduir la generació de residus per al 2030.</li>
                            <li><strong>12.8</strong> - Informació sobre estils de vida sostenibles.</li>
                        </ul>
                    </article>
                    <article class="targeta">
                        <h4 class="titol-targeta">Com hi contribueix EcoLife</h4>
                        <ul class="llista-neta">
                            <li>Mercat d'intercanvi i regal de productes</li>
                            <li>Hàbits de reducció de residus</li>
                            <li>Foment de l'economia circular</li>
                            <li>Conscienciació sobre el consum responsable</li>
                        </ul>
                    </article>
                </div>
            </section>

            <!-- Xifres clau -->
            <section class="seccio">
                <h2>Xifres clau</h2>
                <div class="graella-3">
                    <article class="targeta xifra-gran">
                        <span>1,5°C</span>
                        <p>Límit d'escalfament global que no hem de superar</p>
                    </article>
                    <article class="targeta xifra-gran">
                        <span class="xifra-taronja">931M</span>
                        <p>Tones d'aliments malgastats cada any</p>
                    </article>
                    <article class="targeta xifra-gran">
                        <span>2030</span>
                        <p>Any límit per assolir molts dels ODS</p>
                    </article>
                </div>
            </section>
        </div>
        <?php include_once __DIR__ . '/../includes/footer.html'; ?>
    </main>
</body>
</html>