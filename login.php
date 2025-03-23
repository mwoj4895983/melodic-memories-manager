
<?php
// Plik logowania użytkownika
session_start();

// Jeśli użytkownik jest już zalogowany, przekieruj na stronę główną
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = '';

// Obsługa formularza logowania
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tutaj dodać połączenie z bazą danych
    // require_once('includes/db.php');
    
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Walidacja i weryfikacja użytkownika
    // W docelowej implementacji należy sprawdzić dane w bazie
    if ($email == 'admin@example.com' && $password == 'password') {
        // Symulacja udanego logowania
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = 'Administrator';
        $_SESSION['is_admin'] = true;
        
        header("Location: panel.php");
        exit();
    } else {
        $error = 'Nieprawidłowy adres email lub hasło.';
    }
}

$title = "Logowanie";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Roman Maciejewski</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Nagłówek strony -->
        <?php include('includes/header.php'); ?>
        
        <main>
            <section class="auth-section">
                <div class="auth-container">
                    <h1>Logowanie</h1>
                    
                    <?php if (!empty($error)): ?>
                        <div class="error-message">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="login.php" class="auth-form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Hasło</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-full">Zaloguj się</button>
                        </div>
                        
                        <div class="auth-links">
                            <a href="register.php">Nie masz konta? Zarejestruj się</a>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        
        <!-- Stopka strony -->
        <?php include('includes/footer.php'); ?>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
