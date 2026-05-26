<?php include_once __DIR__ . '/../../includes/meta.php'; ?>
    <title>Registre - EcoLife</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <script src="/js/modeFosc.js" defer></script>
</head>
<body>
    <main class="login-container">
        <section class="login-card">
            <div class="login-header">
                <h1>Crear compte</h1>
                <p>Uneix-te a EcoLife</p>
            </div>

            <?php if(isset($_GET['error'])): ?>
                <p class="avis avis-error">
                    <?php if($_GET['error'] == 1): ?>
                        Cal omplir tots els camps
                    <?php elseif($_GET['error'] == 2): ?>
                        Les contrasenyes no coincideixen
                    <?php elseif($_GET['error'] == 3): ?>
                        Aquest nom d'usuari ja està en ús
                    <?php endif; ?>
                </p>
            <?php endif; ?>

            <form class="login-form" action="/controller/registre.proc.php" method="POST">
                <div class="grup-camp">
                    <label for="usu_nom">Nom d'usuari</label>
                    <input type="text" id="usu_nom" name="usu_nom" required>
                </div>

                <div class="grup-camp">
                    <label for="usu_pass">Contrasenya</label>
                    <input type="password" id="usu_pass" name="usu_pass" required>
                </div>

                <div class="grup-camp">
                    <label for="usu_pass_confirm">Confirmar contrasenya</label>
                    <input type="password" id="usu_pass_confirm" name="usu_pass_confirm" required>
                </div>

                <button type="submit" class="boto boto-verd boto-login">Registrar-se</button>
            </form>

            <p class="login-footer">
                Ja tens compte?
                <a href="/public/view/login.php">Iniciar sessió</a>
            </p>
        </section>
        <?php include_once __DIR__ . '/../../includes/footer.html'; ?>
    </main>
</body>
</html>