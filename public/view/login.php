<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EcoLife</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <main class="login-container">
        <section class="login-card">
            <div class="login-header">
                <h1>Iniciar sessió</h1>
                <p>Accedeix amb autenticació JWT segura</p>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <p class="avis avis-error">
                    <?php if ($_GET['error'] == 1): ?>
                        Usuari o contrasenya incorrectes
                    <?php else: ?>
                        Cal introduir l'usuari i la contrasenya
                    <?php endif; ?>
                </p>
            <?php elseif (isset($_GET['ok'])): ?>
                <p class="avis avis-ok">Compte creat correctament. Ja pots iniciar sessió!</p>
            <?php endif; ?>

            <form class="login-form" action="../controller/login.proc.php" method="POST">
                <div class="grup-camp">
                    <label for="usu_nom">Nom d'usuari</label>
                    <input type="text" id="usu_nom" name="usu_nom" required>
                </div>

                <div class="grup-camp">
                    <label for="usu_pass">Contrasenya</label>
                    <input type="password" id="usu_pass" name="usu_pass" required>
                </div>

                <button type="submit" class="boto boto-verd boto-login">Entrar</button>
            </form>

            <p class="login-footer">
                No tens compte?
                <a href="registre.php">Registrar-se</a>
            </p>
        </section>
        <?php include_once __DIR__ . '/../includes/footer.html'; ?>
    </main>
</body>
</html>