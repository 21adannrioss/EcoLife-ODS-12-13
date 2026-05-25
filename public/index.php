<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoLife - Inici</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/indexPage.js" defer></script>
    <script src="../js/modeFosc.js" defer></script>
</head>
<body>
    <main>
        <header class="header">
            <?php include_once __DIR__ . '/includes/nav.php' ?>

            <span class="etiqueta-ra">ODS 12 i ODS 13</span>
            <h1>EcoLife</h1>
            <p>Registra els teus hàbits sostenibles i ajuda el planeta!</p>
        </header>

        <div class="contingut-principal">
            <!-- Estadístiques carregades des de l'API -->
            <section class="seccio">
                <h2>Resum de la comunitat</h2>
                <div class="graella-3" id="estadistiques">
                    <article class="targeta xifra-gran">
                        <p>Carregant...</p>
                    </article>
                </div>
            </section>

            <!-- Accés ràpid a les seccions -->
            <section class="seccio">
                <h2>Explora l'aplicació</h2>
                <div class="graella-2">
                    <a href="view/habits.php" class="enllac-net">
                        <article class="targeta">
                            <h3>Gestió de Hàbits</h3>
                            <p class="text-secundari">Afegeix, edita i elimina els teus hàbits sostenibles. CRUD</p>
                        </article>
                    </a>
                    <a href="view/mercat.php" class="enllac-net">
                        <article class="targeta">
                            <h3>Mercat d'Intercanvi</h3>
                            <p class="text-secundari">Intercanvia i regala objectes que ja no necessites. Economia circular</p>
                        </article>
                    </a>
                    <a href="view/calculadora.php" class="enllac-net">
                        <article class="targeta">
                            <h3>Calculadora CO₂</h3>
                            <p class="text-secundari">Calcula quantes emissions generes cada any amb les teves activitats.</p>
                        </article>
                    </a>
                    <a href="view/estadistiques.php" class="enllac-net">
                        <article class="targeta">
                            <h3>Estadístiques</h3>
                            <p class="text-secundari">Veu l'impacte de tots els hàbits registrats carregats des de l'API.</p>
                        </article>
                    </a>
                </div>
            </section>
        </div>
        <?php include_once __DIR__ . '/includes/footer.html'; ?>
    </main>
</body>
</html>