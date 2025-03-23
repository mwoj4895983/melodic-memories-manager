
<header>
    <div class="header-content">
        <div class="logo">
            <a href="index.php">
                <i class="fas fa-music"></i>
                <span>Roman Maciejewski</span>
            </a>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Strona Główna</a></li>
                <li><a href="biografia.php">Biografia</a></li>
                <li><a href="muzyka.php">Muzyka</a></li>
                <li><a href="kontakt.php">Kontakt</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="panel.php" class="btn-outline">Panel Użytkownika</a>
                <a href="logout.php" class="btn">Wyloguj</a>
            <?php else: ?>
                <a href="login.php" class="btn-outline">Logowanie</a>
                <a href="register.php" class="btn">Rejestracja</a>
            <?php endif; ?>
        </div>
        <button class="mobile-menu-toggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</header>
