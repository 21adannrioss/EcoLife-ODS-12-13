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

            <!-- Missatge d'error -->
            <div class="avis avis-error">Usuari o contrasenya incorrectes</div>

            <form class="login-form" action="login.php" method="POST">
                <div class="grup-camp">
                    <label for="email">Correu electrònic</label>
                    <input type="email "id="email" name="email" required>
                </div>

                <div class="grup-camp">
                    <label for="password">Contrasenya</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="boto boto-verd boto-login">Entrar</button>
            </form>

            <div class="jwt-info bloc-info">
                En iniciar sessió, el servidor generarà un token JWT
                que s’emmagatzemarà en una cookie segura.
            </div>

            <div class="login-footer">
                No tens compte?
                <a href="registre.php">Registrar-se</a>
            </div>
        </section>
    </main>
</body>
</html>