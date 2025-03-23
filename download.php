
<?php
// Plik obsługujący pobieranie utworów
session_start();

// Sprawdzenie czy użytkownik jest zalogowany
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Sprawdzenie czy podano ID utworu
if (!isset($_GET['id'])) {
    header("Location: muzyka.php");
    exit();
}

$id = intval($_GET['id']);

// Symulowane dane - w docelowej implementacji z bazy danych
$utwory = [
    1 => [
        'id' => 1,
        'tytul' => 'Requiem',
        'plik' => 'audio/requiem_fragment.mp3'
    ],
    2 => [
        'id' => 2,
        'tytul' => 'Mazurki',
        'plik' => 'audio/mazurki.mp3'
    ],
    3 => [
        'id' => 3,
        'tytul' => 'Pieśni Kurpiowskie',
        'plik' => 'audio/piesni_kurpiowskie.mp3'
    ]
];

// Sprawdzenie czy utwór istnieje
if (!array_key_exists($id, $utwory)) {
    header("Location: muzyka.php");
    exit();
}

$utwor = $utwory[$id];

// W docelowej implementacji należy zapisać informację o pobraniu w bazie danych
// ...

// Sprawdzenie czy plik istnieje (w tej symulacji zawsze zwraca false, ponieważ pliki nie istnieją)
if (!file_exists($utwor['plik'])) {
    // W rzeczywistej implementacji te pliki powinny istnieć
    // Tutaj przekierowujemy z powrotem i wyświetlamy komunikat
    $_SESSION['download_error'] = "Przepraszamy, plik nie jest obecnie dostępny.";
    header("Location: muzyka.php?id=" . $id);
    exit();
}

// Pobieranie pliku
$file = $utwor['plik'];
$file_name = basename($file);

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $utwor['tytul'] . '.mp3"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
flush();
readfile($file);
exit;
?>
