<?php
// Llegeix el token per saber si l'usuari està autenticat i quin rol té
include_once __DIR__ . '/auth.php';
$usuari = validarToken();
?>
<nav>
    <a href="/public/view/index.php" class="logo">EcoLife</a>
    <ul>
        <li><a href="/public/view/index.php">Inici</a></li>
        <li><a href="/public/view/ods.php">ODS</a></li>
        <li><a href="/public/view/reptes.php">Reptes</a></li>
        <li><a href="/public/view/habits.php">Hàbits</a></li>
        <li><a href="/public/view/mercat.php">Mercat</a></li>
        <li><a href="/public/view/calculadora.php">Calculadora</a></li>
        <li><a href="/public/view/sostenibilitat.php">Sostenibilitat</a></li>
        <li><a href="/public/view/empresa.php">Empresa</a></li>
        <li><a href="/public/view/estadistiques.php">Estadístiques</a></li>
        <li><a href="/public/view/sobre.php">Sobre</a></li>

        <?php if($usuari && $usuari['rol'] === 'admin'): ?>
            <!-- Només visible per als admins -->
            <li><a href="/public/view/admin.php">Admin</a></li>
        <?php endif; ?>
    </ul>

    <div style="display:flex; align-items:center; gap:10px;">
        <?php if($usuari): ?>
            <!-- Usuari autenticat -->
            <span style="color:white; font-size:14px;">Hola, <?= htmlspecialchars($usuari['nom']) ?></span>
            <a href="/controller/logout.proc.php" class="boto-nav">Tancar sessió</a>
        <?php else: ?>
            <!-- Usuari no autenticat -->
            <a href="/public/view/login.php" class="boto-nav">Iniciar sessió</a>
        <?php endif; ?>
        <button id="btn-dark" class="boto-dark" title="Canviar mode">🌙</button>
    </div>
</nav>