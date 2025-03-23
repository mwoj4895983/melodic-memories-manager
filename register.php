
<?php
// Plik rejestracji użytkownika
session_start();

// Jeśli użytkownik jest już zalogowany, przekieruj na stronę główną
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = '';
$success = '';

// Obsługa formularza rejestracji
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tutaj dodać połączenie z bazą danych
    // require_once('includes/db.php');
    
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Podstawowa walidacja
    if (empty($username) || empty($email) || empty($password)) {
        $error = 'Wszystkie pola są wymagane.';
    } elseif ($password !== $confirm_password) {
        $error = 'Hasła nie są identyczne.';
    } elseif (strlen($password) < 6) {
        $error = 'Hasło musi mieć co najmniej 6 znaków.';
    } else {
        // W docelowej implementacji należy dodać użytkownika do bazy
        // oraz przeprowadzić weryfikację emaila, hasła, itp.
        
        // Symulacja udanej rejestracji
        $success = 'Rejestracja przebiegła pomyślnie! Możesz się teraz zalogować.';
    }
}

$title = "Rejestracja";
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
                    <h1>Rejestracja</h1>
                    
                    <?php if (!empty($error)): ?>
                        <div class="error-message">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($success)): ?>
                        <div class="success-message">
                            <?php echo $success; ?>
                            <p><a href="login.php">Przejdź do logowania</a></p>
                        </div>
                    <?php else: ?>
                        <form method="POST" action="register.php" class="auth-form">
                            <div class="form-group">
                                <label for="username">Nazwa użytkownika</label>
                                <input type="text" id="username" name="username" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Hasło</label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="confirm_password">Potwierdź hasło</label>
                                <input type="password" id="confirm_password" name="confirm_password" required>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-full">Zarejestruj się</button>
                            </div>
                            
                            <div class="auth-links">
                                <a href="login.php">Masz już konto? Zaloguj się</a>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </section>
        </main>
        
        <!-- Stopka strony -->
        <?php include('includes/footer.php'); ?>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
