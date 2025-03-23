
<?php
// Plik wylogowania użytkownika
session_start();

// Usunięcie wszystkich zmiennych sesyjnych
$_SESSION = array();

// Usunięcie ciasteczka sesji
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Zniszczenie sesji
session_destroy();

// Przekierowanie do strony głównej
header("Location: index.php");
exit();
?>
