
<?php
// Plik z funkcjami pomocniczymi

/**
 * Filtrowanie danych wejściowych
 * 
 * @param string $data Dane do filtrowania
 * @return string Przefiltrowane dane
 */
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * Generowanie tokenu CSRF
 * 
 * @return string Wygenerowany token CSRF
 */
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Weryfikacja tokenu CSRF
 * 
 * @param string $token Token do weryfikacji
 * @return bool Czy token jest poprawny
 */
function verify_csrf_token($token) {
    if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        return false;
    }
    return true;
}

/**
 * Przekierowanie do innej strony
 * 
 * @param string $url URL do przekierowania
 * @return void
 */
function redirect($url) {
    header("Location: $url");
    exit();
}

/**
 * Sprawdzenie czy użytkownik jest zalogowany
 * 
 * @return bool Czy użytkownik jest zalogowany
 */
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

/**
 * Sprawdzenie czy użytkownik jest administratorem
 * 
 * @return bool Czy użytkownik jest administratorem
 */
function is_admin() {
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
}

/**
 * Wymuszenie zalogowania lub przekierowanie do strony logowania
 * 
 * @return void
 */
function require_login() {
    if (!is_logged_in()) {
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
        redirect('login.php');
    }
}

/**
 * Wymuszenie uprawnień administratora lub przekierowanie
 * 
 * @return void
 */
function require_admin() {
    require_login();
    if (!is_admin()) {
        redirect('index.php');
    }
}

/**
 * Formatowanie daty do czytelnego formatu
 * 
 * @param string $date Data w formacie SQL
 * @param bool $with_time Czy dołączyć czas
 * @return string Sformatowana data
 */
function format_date($date, $with_time = false) {
    $timestamp = strtotime($date);
    if ($with_time) {
        return date('d.m.Y, H:i', $timestamp);
    } else {
        return date('d.m.Y', $timestamp);
    }
}

/**
 * Skrócenie tekstu do określonej długości
 * 
 * @param string $text Tekst do skrócenia
 * @param int $length Maksymalna długość
 * @param string $append Tekst dołączany na końcu
 * @return string Skrócony tekst
 */
function truncate_text($text, $length = 100, $append = '...') {
    if (strlen($text) <= $length) {
        return $text;
    }
    
    $text = substr($text, 0, $length);
    $text = substr($text, 0, strrpos($text, ' '));
    
    return $text . $append;
}

/**
 * Generowanie losowego ciągu znaków
 * 
 * @param int $length Długość ciągu
 * @return string Losowy ciąg znaków
 */
function random_string($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    
    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[random_int(0, strlen($characters) - 1)];
    }
    
    return $string;
}

/**
 * Sprawdzenie czy adres email jest poprawny
 * 
 * @param string $email Adres email do sprawdzenia
 * @return bool Czy adres jest poprawny
 */
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Hashowanie hasła
 * 
 * @param string $password Hasło do zahashowania
 * @return string Zahashowane hasło
 */
function hash_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

/**
 * Weryfikacja hasła
 * 
 * @param string $password Hasło do weryfikacji
 * @param string $hash Hash do porównania
 * @return bool Czy hasło jest poprawne
 */
function verify_password($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * Zapisanie komunikatu do wyświetlenia na następnej stronie
 * 
 * @param string $type Typ komunikatu (success, error, info, warning)
 * @param string $message Treść komunikatu
 * @return void
 */
function set_flash_message($type, $message) {
    if (!isset($_SESSION['flash_messages'])) {
        $_SESSION['flash_messages'] = [];
    }
    
    $_SESSION['flash_messages'][] = [
        'type' => $type,
        'message' => $message
    ];
}

/**
 * Wyświetlenie zapisanych komunikatów
 * 
 * @return string HTML z komunikatami
 */
function display_flash_messages() {
    if (!isset($_SESSION['flash_messages']) || empty($_SESSION['flash_messages'])) {
        return '';
    }
    
    $output = '';
    foreach ($_SESSION['flash_messages'] as $message) {
        $output .= '<div class="flash-message flash-' . $message['type'] . '">';
        $output .= $message['message'];
        $output .= '</div>';
    }
    
    // Wyczyść komunikaty po wyświetleniu
    $_SESSION['flash_messages'] = [];
    
    return $output;
}

/**
 * Dodanie informacji o odwiedzinach strony do statystyk
 * 
 * @param string $page Nazwa odwiedzanej strony
 * @return void
 */
function log_page_visit($page) {
    // W rzeczywistej implementacji zapisywać do bazy danych
    // Tutaj tylko przykład jak mogłaby wyglądać taka funkcja
    
    $user_id = $_SESSION['user_id'] ?? 0;
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $timestamp = date('Y-m-d H:i:s');
    
    // db_insert('page_visits', [
    //     'page' => $page,
    //     'user_id' => $user_id,
    //     'ip' => $ip,
    //     'user_agent' => $user_agent,
    //     'visit_time' => $timestamp
    // ]);
}

/**
 * Dodanie informacji o pobraniu utworu do statystyk
 * 
 * @param int $music_id ID pobranego utworu
 * @return void
 */
function log_music_download($music_id) {
    // W rzeczywistej implementacji zapisywać do bazy danych
    
    $user_id = $_SESSION['user_id'] ?? 0;
    $ip = $_SERVER['REMOTE_ADDR'];
    $timestamp = date('Y-m-d H:i:s');
    
    // db_insert('downloads', [
    //     'music_id' => $music_id,
    //     'user_id' => $user_id,
    //     'ip' => $ip,
    //     'download_time' => $timestamp
    // ]);
}
