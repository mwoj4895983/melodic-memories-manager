
<?php
// Plik z biblioteką muzyczną
session_start();

// Symulowane dane - w docelowej implementacji z bazy danych
$utwory = [
    1 => [
        'id' => 1,
        'tytul' => 'Requiem',
        'opis' => 'Monumentalne dzieło będące odpowiedzią na tragedię II wojny światowej. Składa się z kilkunastu części i trwa ponad dwie godziny.',
        'rok' => '1959',
        'plik' => 'audio/requiem_fragment.mp3',
        'obraz' => 'images/requiem.jpg'
    ],
    2 => [
        'id' => 2,
        'tytul' => 'Mazurki',
        'opis' => 'Inspirowane folklorem polskie tańce, pełne charakterystycznych rytmów i melodii ludowych. Maciejewski napisał kilkadziesiąt mazurków.',
        'rok' => '1930-1950',
        'plik' => 'audio/mazurki.mp3',
        'obraz' => 'images/mazurki.jpg'
    ],
    3 => [
        'id' => 3,
        'tytul' => 'Pieśni Kurpiowskie',
        'opis' => 'Zbiór utworów wokalnych opartych na muzyce regionu kurpiowskiego. Charakteryzują się oryginalnymi melodiami i tekstami.',
        'rok' => '1948',
        'plik' => 'audio/piesni_kurpiowskie.mp3',
        'obraz' => 'images/kurpie.jpg'
    ]
];

// Szczegółowy widok utworu
$selected_utwor = null;
if (isset($_GET['id']) && array_key_exists($_GET['id'], $utwory)) {
    $selected_utwor = $utwory[$_GET['id']];
}

$title = $selected_utwor ? $selected_utwor['tytul'] : "Biblioteka Muzyczna";
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
            <?php if ($selected_utwor): ?>
                <!-- Szczegóły utworu -->
                <section class="music-details">
                    <div class="music-header">
                        <h1><?php echo $selected_utwor['tytul']; ?></h1>
                        <p class="music-year"><?php echo $selected_utwor['rok']; ?></p>
                    </div>
                    
                    <div class="music-content">
                        <div class="music-image">
                            <img src="<?php echo $selected_utwor['obraz']; ?>" alt="<?php echo $selected_utwor['tytul']; ?>">
                        </div>
                        
                        <div class="music-info">
                            <p class="music-description"><?php echo $selected_utwor['opis']; ?></p>
                            
                            <div class="music-player">
                                <audio controls>
                                    <source src="<?php echo $selected_utwor['plik']; ?>" type="audio/mpeg">
                                    Twoja przeglądarka nie obsługuje odtwarzacza audio.
                                </audio>
                            </div>
                            
                            <div class="music-actions">
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <a href="download.php?id=<?php echo $selected_utwor['id']; ?>" class="btn">
                                        <i class="fas fa-download"></i> Pobierz utwór
                                    </a>
                                <?php else: ?>
                                    <div class="login-notice">
                                        <p>Aby pobrać utwór, <a href="login.php">zaloguj się</a> lub <a href="register.php">zarejestruj</a>.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="back-link">
                        <a href="muzyka.php"><i class="fas fa-arrow-left"></i> Powrót do biblioteki</a>
                    </div>
                </section>
            <?php else: ?>
                <!-- Lista utworów -->
                <section class="music-library">
                    <h1>Biblioteka Muzyczna</h1>
                    <p class="section-intro">Odkryj bogactwo twórczości Romana Maciejewskiego poprzez jego najważniejsze dzieła.</p>
                    
                    <div class="music-grid">
                        <?php foreach ($utwory as $utwor): ?>
                            <div class="music-card">
                                <div class="music-card-image">
                                    <img src="<?php echo $utwor['obraz']; ?>" alt="<?php echo $utwor['tytul']; ?>">
                                </div>
                                <div class="music-card-content">
                                    <h3><?php echo $utwor['tytul']; ?></h3>
                                    <p class="music-year"><?php echo $utwor['rok']; ?></p>
                                    <p class="music-excerpt"><?php echo substr($utwor['opis'], 0, 100); ?>...</p>
                                    <div class="music-card-actions">
                                        <a href="muzyka.php?id=<?php echo $utwor['id']; ?>" class="btn-sm">Szczegóły</a>
                                        <audio controls>
                                            <source src="<?php echo $utwor['plik']; ?>" type="audio/mpeg">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>
        </main>
        
        <!-- Stopka strony -->
        <?php include('includes/footer.php'); ?>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
