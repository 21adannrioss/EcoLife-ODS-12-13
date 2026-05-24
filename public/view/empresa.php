<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa - EcoLife</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/../includes/nav.php' ?>

            <span class="etiqueta-ra">RA6 · Pla de sostenibilitat empresarial</span>
            <h1>Anàlisi d'Empresa Real</h1>
            <p>Estudi de l'informe de sostenibilitat d'una empresa tecnològica.</p>
        </header>

        <div class="contingut-principal">
            <!-- Presentació de l'empresa -->
            <section class="seccio">
                <article class="targeta capçalera-empresa">
                    <span class="icona-empresa">🍎</span>
                    <div>
                        <h2>Apple Inc.</h2>
                        <p class="subtitol-empresa">Empresa tecnològica · Cupertino, Califòrnia · Informe de
                            sostenibilitat 2023</p>
                    </div>
                </article>
            </section>

            <section class="seccio">
                <aside class="bloc-info">
                    <strong>Per què Apple?</strong> He triat Apple perquè és una empresa molt coneguda amb un pla de
                    sostenibilitat molt concret.
                    A l'informe anual publiquen dades reals i objectius amb dates, cosa que permet analitzar si estan
                    complint els
                    seus compromisos.
                </aside>
            </section>

            <!-- Accions mediambientals -->
            <section class="seccio">
                <h2>Accions pel medi ambient</h2>
                <div class="graella-2">
                    <aside class="bloc-info">
                        <strong>Carboni neutral per al 2030:</strong> Apple s'ha compromès a ser 100% neutral en carboni
                        en tot el
                        negoci,
                        la cadena de fabricació i el cicle de vida dels productes.
                    </aside>
                    <aside class="bloc-info">
                        <strong>100% energies renovables des del 2018:</strong> Totes les seves oficines, botigues i
                        centres de
                        dades
                        ja funcionen amb energia 100% renovable.
                    </aside>
                    <aside class="bloc-info">
                        <strong>Materials reciclats:</strong> L'iPhone 15 inclou alumini 100% reciclat a la carcassa.
                        Altres components incorporen cobalt, or i terres rares recuperades d'aparells vells.
                    </aside>
                    <aside class="bloc-info">
                        <strong>Robot Daisy:</strong> Apple té un robot especialitzat que desmunta fins a 1,2 milions
                        d'iPhones per
                        any
                        per recuperar materials valuosos i evitar que acabin als abocadors.
                    </aside>
                </div>
            </section>

            <!-- Grups d'interès -->
            <section class="seccio">
                <h2>Grups d'interès (Stakeholders)</h2>
                <div class="graella-3">
                    <article class="targeta">
                        <p class="icona-xl">👷</p>
                        <h4 class="titol-targeta">Treballadors</h4>
                        <p class="text-secundari">
                            Apple publica anualment un informe de responsabilitat dels proveïdors,
                            amb requisits mínims de condicions laborals per als seus 200+ proveïdors estratègics.
                        </p>
                    </article>
                    <article class="targeta">
                        <p class="icona-xl">🛒</p>
                        <h4 class="titol-targeta">Clients</h4>
                        <p class="text-secundari">
                            El programa <em>Apple Trade In</em> permet tornar dispositius vells a canvi d'un descompte,
                            fomentant l'economia circular entre els seus clients.
                        </p>
                    </article>
                    <article class="targeta">
                        <p class="icona-xl">🌍</p>
                        <h4 class="titol-targeta">Comunitat</h4>
                        <p class="text-secundari">
                            Apple ha invertit en programes educatius STEM per a comunitats desfavorides
                            amb iniciatives com <em>Everyone Can Code</em>.
                        </p>
                    </article>
                </div>
            </section>

            <!-- Com mesuren l'impacte -->
            <section class="seccio">
                <h2>Com mesuren el seu impacte</h2>
                <aside class="bloc-info">
                    <strong>Protocol GHG (Greenhouse Gas Protocol):</strong> Apple segueix aquest estàndard
                    internacional
                    per comptabilitzar les seves emissions i poder-les comparar amb altres empreses.
                </aside>
                <aside class="bloc-info">
                    <strong>Auditories externes independents:</strong> Les dades de sostenibilitat les verifica KPMG
                    de forma independent per garantir que siguin verídiques i evitar el "greenwashing".
                </aside>
                <aside class="bloc-info">
                    <strong>Objectius científics (SBTi):</strong> Els seus objectius estan alineats amb la ciència
                    climàtica
                    per limitar l'escalfament global a 1,5°C, directament relacionat amb l'ODS 13.
                </aside>
            </section>

            <!-- Valoració crítica -->
            <section class="seccio">
                <h2>Valoració crítica</h2>
                <div class="graella-2">
                    <article class="targeta">
                        <h4 class="titol-targeta">Punts forts</h4>
                        <ul class="llista-neta">
                            <li>Objectiu de carboni neutral amb data concreta (2030)</li>
                            <li>Verificació externa independent de les dades</li>
                            <li>100% renovables a les operacions pròpies des del 2018</li>
                            <li>Innovació real en reciclatge (robot Daisy)</li>
                        </ul>
                    </article>
                    <article class="targeta">
                        <h4 class="titol-taronja">⚠ Punts de millora</h4>
                        <ul class="llista-neta">
                            <li>Els dispositius Apple son difícils de reparar per l'usuari</li>
                            <li>El model de negoci afavoreix renovar el mòbil cada 2 anys</li>
                            <li>Les emissions de la cadena de subministrament son difícils de controlar</li>
                        </ul>
                    </article>
                </div>
            </section>
        </div>
        <?php include_once __DIR__ . '/../includes/footer.html'; ?>
    </main>
</body>
</html>