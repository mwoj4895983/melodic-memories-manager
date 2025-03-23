
<?php
// Plik główny - strona startowa
session_start();

// Podstawowa konfiguracja
$title = "Roman Maciejewski - Strona Główna";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome dla ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Nagłówek strony -->
        <?php include('includes/header.php'); ?>
        
        <main>
            <section class="hero">
                <div class="hero-content">
                    <h1>Roman Maciejewski</h1>
                    <p>Poznaj twórczość wybitnego polskiego kompozytora</p>
                    <a href="muzyka.php" class="btn">Odkryj Muzykę</a>
                </div>
            </section>
            
            <section class="featured-works">
                <h2>Wybitne Dzieła</h2>
                <div class="works-grid">
                    <div class="work-card">
                        <img src="images/placeholder.jpg" alt="Requiem">
                        <h3>Requiem</h3>
                        <p>Monumentalne dzieło będące odpowiedzią na tragedię II wojny światowej.</p>
                        <a href="muzyka.php?id=1" class="btn-sm">Posłuchaj</a>
                    </div>
                    <div class="work-card">
                        <img src="images/placeholder.jpg" alt="Mazurki">
                        <h3>Mazurki</h3>
                        <p>Inspirowane folklorem polskie tańce, pełne charakterystycznych rytmów.</p>
                        <a href="muzyka.php?id=2" class="btn-sm">Posłuchaj</a>
                    </div>
                    <div class="work-card">
                        <img src="images/placeholder.jpg" alt="Pieśni Kurpiowskie">
                        <h3>Pieśni Kurpiowskie</h3>
                        <p>Zbiór utworów wokalnych opartych na muzyce regionu kurpiowskiego.</p>
                        <a href="muzyka.php?id=3" class="btn-sm">Posłuchaj</a>
                    </div>
                </div>
            </section>
            
            <section class="biography">
                <h2>O Kompozytorze</h2>
                <div class="bio-content">
                    <img src="images/maciejewski.jpg" alt="Roman Maciejewski" class="bio-image">
                    <div class="bio-text">
                        <p>Roman Maciejewski (1910-1998) to jeden z najwybitniejszych polskich kompozytorów XX wieku. Jego twórczość łączy w sobie wpływy muzyki ludowej, religijnej oraz nowatorskie techniki kompozytorskie.</p>
                        <p>Studiował w konserwatorium w Poznaniu, a następnie w Warszawie i za granicą. Mieszkał i tworzył w wielu krajach, w tym w Stanach Zjednoczonych i Szwecji.</p>
                        <a href="biografia.php" class="btn">Czytaj Więcej</a>
                    </div>
                </div>
            </section>
        </main>
        
        <!-- Stopka strony -->
        <?php include('includes/footer.php'); ?>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
