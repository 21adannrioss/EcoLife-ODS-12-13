<?php include_once __DIR__ . '/../../includes/meta.php'; ?>
    <title>Sobre el projecte - EcoLife</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/styles.css">
    <script src="<?= BASE_URL ?>/js/modeFosc.js" defer></script>
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/../../includes/nav.php' ?>
            <h1>Sobre EcoLife</h1>
        </header>

        <div class="contingut-principal">
            <section class="seccio">
                <h2>Descripció del projecte</h2>
                <p class="paragraf-descripcio">EcoLife és una aplicació web dinàmica desenvolupada com a projecte del cicle formatiu de Desenvolupament d'Aplicacions Web (DAW).</p>
                <p class="paragraf-descripcio">
                    L'aplicació treballa els <strong>ODS 12</strong> (Consum i Producció Responsables) i
                    <strong>ODS 13</strong> (Acció pel Clima), permetent als usuaris registrar hàbits sostenibles,
                    calcular la seva petjada de carboni i intercanviar productes de segona mà.
                </p>
            </section>

            <!-- Tecnologies usades -->
            <section class="seccio">
                <h2>Tecnologies usades</h2>
                <div class="graella-2">
                    <article class="targeta">
                        <h4 class="titol-targeta">Frontend (client)</h4>
                        <ul class="llista-neta">
                            <li>HTML5</li>
                            <li>CSS3</li>
                            <li>JavaScript (vanilla)</li>
                            <li>fetch() amb async/await</li>
                            <li>Gestió del DOM amb events i listeners</li>
                        </ul>
                    </article>
                    <article class="targeta">
                        <h4 class="titol-targeta">Backend (servidor)</h4>
                        <ul class="llista-neta">
                            <li>PHP 8 (autenticació, mercat, vistes)</li>
                            <li>Node.js + Express.js (API hàbits)</li>
                            <li>SQLite compartida (better-sqlite3 / SQLite3)</li>
                            <li>API REST (GET, POST, PUT, DELETE)</li>
                            <li>Autenticació amb JWT (cookies)</li>
                            <li>Patró DAO per accés a dades</li>
                            <li>nodemon per al desenvolupament</li>
                        </ul>
                    </article>
                </div>
            </section>

            <!-- Requisits coberts -->
            <section class="seccio">
                <h2>Requisits del projecte coberts</h2>
                <div class="graella-2">
                    <div>
                        <h4 class="titol-ra-verd">Mòdul Client (RA7)</h4>
                        <ul class="llista-neta">
                            <li>10 pàgines amb navbar funcional</li>
                            <li>CRUD complet (GET, POST, PUT, DELETE)</li>
                            <li>fetch() amb async/await</li>
                            <li>Validació de formularis al client</li>
                            <li>Modificació del DOM amb events i listeners</li>
                            <li>API REST amb Node.js i Express (hàbits)</li>
                            <li>API REST amb PHP (mercat)</li>
                            <li>Persistència de dades amb SQLite</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="titol-ra-taronja">Mòdul Sostenibilitat</h4>
                        <ul class="llista-neta">
                            <li>RA1: ODS 12 i 13, impacte ASG</li>
                            <li>RA2: Reptes concrets identificats</li>
                            <li>RA3: Hàbits sostenibles del programador/a</li>
                            <li>RA4: Mercat d'economia circular</li>
                            <li>RA5: Web eficient, emojis, mínim peticions</li>
                            <li>RA6: Anàlisi de sostenibilitat d'Apple</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Instruccions d'ús -->
            <section class="seccio">
                <h2>Com executar el projecte</h2>
                <article class="targeta targeta-codi">
                    <p><span class="codi-comentari"># Pas 1: Instal·la les dependències de Node.js</span></p>
                    <p>npm install</p>
                    <br />
                    <p><span class="codi-comentari"># Pas 2: Terminal 1 - Arrenca el servidor Node.js (API hàbits, port 3000)</span></p>
                    <p>npm run dev</p>
                    <br />
                    <p><span class="codi-comentari"># Pas 3: Terminal 2 - Arrenca el servidor PHP (vistes i API mercat, port 8000)</span></p>
                    <p>php -S localhost:8000</p>
                    <br />
                    <p><span class="codi-comentari"># Pas 4: Obre el navegador a</span></p>
                    <p>http://localhost:8000</p>
                </article>
            </section>

            <!-- Reflexió personal -->
            <section class="seccio">
                <h2>El que he après</h2>
                <aside class="bloc-info">
                    <strong>Tècnicament:</strong> Combinar dos servidors (PHP i Node.js) que comparteixen la mateixa
                    base de dades SQLite ha sigut el repte principal. Entendre com gestionar CORS, autenticació
                    amb JWT i el patró DAO m'ha donat una visió real de com funcionen les aplicacions web en producció.
                </aside>
                <aside class="bloc-info">
                    <strong>Com a persona:</strong> Crear una aplicació sobre sostenibilitat m'ha fet pensar més
                    en l'impacte de les meves pròpies decisions diàries. La tecnologia pot ajudar a fer el món millor.
                </aside>
            </section>
        </div>
        <?php include_once __DIR__ . '/../../includes/footer.html'; ?>
    </main>
</body>
</html>