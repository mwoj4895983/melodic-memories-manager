
<?php
// Plik z biografią Romana Maciejewskiego
session_start();

$title = "Biografia - Roman Maciejewski";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Nagłówek strony -->
        <?php include('includes/header.php'); ?>
        
        <main>
            <section class="biography-page">
                <div class="layout-container">
                    <h1>Roman Maciejewski - Biografia</h1>
                    
                    <div class="biography-content">
                        <img src="images/maciejewski.jpg" alt="Roman Maciejewski" class="biography-main-image">
                        
                        <div class="biography-text">
                            <h2>Wczesne lata (1910-1930)</h2>
                            <p>Roman Maciejewski urodził się 28 lutego 1910 roku w Berlinie, gdzie jego ojciec, Józef Maciejewski, pracował jako organista i dyrygent chóru. Rodzina wróciła do Polski po I wojnie światowej, osiedlając się w Lesznie. Tam młody Roman rozpoczął naukę muzyki pod kierunkiem swojego ojca.</p>
                            <p>W 1924 roku Maciejewski rozpoczął studia w Konserwatorium Muzycznym w Poznaniu. Uczył się tam fortepianu pod kierunkiem Bohdana Zaleskiego oraz teorii i kompozycji u Stanisława Wiechowicza. Już podczas studiów wyróżniał się niezwykłym talentem, zarówno jako pianista, jak i kompozytor.</p>
                            
                            <h2>Okres warszawski i pierwsze sukcesy (1930-1934)</h2>
                            <p>Po ukończeniu studiów w Poznaniu, Maciejewski kontynuował naukę w Warszawie pod kierunkiem Kazimierza Sikorskiego. W tym czasie skomponował swoje pierwsze znaczące dzieła, w tym Mazurki na fortepian, które zyskały uznanie krytyków. Utwory te, inspirowane folklorem polskim, pokazywały już oryginalne podejście kompozytora do tradycyjnych form muzycznych.</p>
                            <p>W 1932 roku otrzymał stypendium, które umożliwiło mu wyjazd do Paryża na studia u słynnej Nadii Boulanger. Pobyt we Francji otworzył przed nim nowe horyzonty muzyczne i zapoznał go z najnowszymi trendami w muzyce europejskiej.</p>
                            
                            <h2>Lata podróży (1934-1951)</h2>
                            <p>Po powrocie z Paryża, Maciejewski nie osiadł na stałe w Polsce. Rozpoczął okres intensywnych podróży, koncertując jako pianista i prezentując swoje kompozycje w różnych krajach Europy. W 1934 roku wyjechał do Londynu, gdzie jego utwory zyskały uznanie publiczności.</p>
                            <p>Wybuch II wojny światowej zastał go w Szwecji, gdzie pozostał do 1951 roku. Okres szwedzki był niezwykle płodny dla kompozytora. Powstały wtedy liczne utwory kameralne, pieśni oraz rozpoczął prace nad swoim monumentalnym dziełem - "Requiem".</p>
                            
                            <h2>Okres amerykański (1951-1977)</h2>
                            <p>W 1951 roku Maciejewski wyjechał do Stanów Zjednoczonych. Początkowo osiadł w Nowym Jorku, a następnie przeniósł się do Los Angeles. W Kalifornii pracował jako organista w kościele katolickim i kontynuował swoją działalność kompozytorską.</p>
                            <p>To właśnie w Ameryce ukończył swoje "Requiem", nad którym pracował przez ponad 15 lat. Premiera tego monumentalnego dzieła odbyła się w 1960 roku w Warszawie i stała się jednym z najważniejszych wydarzeń muzycznych w powojennej Polsce.</p>
                            <p>Okres amerykański był również czasem, gdy Maciejewski zainteresował się filozofią Wschodu, medytacją i joga, co miało znaczący wpływ na jego późniejsze kompozycje i światopogląd.</p>
                            
                            <h2>Powrót do Europy i ostatnie lata (1977-1998)</h2>
                            <p>W 1977 roku Maciejewski wrócił do Europy, osiedlając się ponownie w Szwecji, w miejscowości Göteborg. W tym okresie skupił się głównie na mniejszych formach muzycznych i kontynuował praktyki medytacyjne.</p>
                            <p>W latach 80. i 90. jego muzyka zaczęła być na nowo odkrywana w Polsce. Organizowano koncerty poświęcone jego twórczości, a on sam kilkakrotnie odwiedził ojczyznę.</p>
                            <p>Roman Maciejewski zmarł 30 kwietnia 1998 roku w Göteborg. Pozostawił po sobie imponujący dorobek kompozytorski, który do dziś jest wykonywany i nagrywany przez wybitnych artystów na całym świecie.</p>
                            
                            <h2>Styl muzyczny i dziedzictwo</h2>
                            <p>Muzyka Romana Maciejewskiego łączy w sobie wpływy wielu źródeł: polskiej muzyki ludowej, religijnej muzyki dawnej, europejskiego neoklasycyzmu oraz filozofii Wschodu. Jego styl charakteryzuje się szczególną dbałością o formę, czystość harmoniczną oraz ekspresję emocjonalną.</p>
                            <p>"Requiem" jest uważane za jego największe dzieło - monumentalna kompozycja trwająca ponad dwie godziny, napisana na cztery głosy solowe, dwa chóry mieszane i dwie orkiestry. Inne ważne dzieła to cykle Mazurków, Pieśni Kurpiowskie, Koncert fortepianowy, liczne utwory religijne oraz muzyka kameralna.</p>
                            <p>Maciejewski był kompozytorem, który nie poddał się żadnemu z dominujących w XX wieku trendów awangardowych. Pozostał wierny tonalności, melodyce i klasycznym formom, jednocześnie tworząc dzieła o głęboko osobistym charakterze. Jego muzyka przeżywa obecnie renesans zainteresowania, a kolejne pokolenia muzyków i słuchaczy odkrywają jej ponadczasowe piękno i głębię.</p>
                        </div>
                    </div>
                    
                    <div class="timeline">
                        <h2>Kalendarium życia</h2>
                        <ul class="timeline-list">
                            <li class="timeline-item">
                                <div class="timeline-date">1910</div>
                                <div class="timeline-content">
                                    <h3>Narodziny w Berlinie</h3>
                                    <p>Roman Maciejewski przychodzi na świat 28 lutego w Berlinie</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-date">1924-1930</div>
                                <div class="timeline-content">
                                    <h3>Studia w Poznaniu</h3>
                                    <p>Nauka w Konserwatorium Muzycznym w Poznaniu</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-date">1930-1934</div>
                                <div class="timeline-content">
                                    <h3>Okres warszawski i paryski</h3>
                                    <p>Studia w Warszawie i Paryżu, pierwsze znaczące kompozycje</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-date">1934-1951</div>
                                <div class="timeline-content">
                                    <h3>Okres szwedzki</h3>
                                    <p>Pobyt w Szwecji, rozpoczęcie pracy nad "Requiem"</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-date">1951-1977</div>
                                <div class="timeline-content">
                                    <h3>Okres amerykański</h3>
                                    <p>Pobyt w USA, ukończenie i premiera "Requiem" (1960)</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-date">1977-1998</div>
                                <div class="timeline-content">
                                    <h3>Powrót do Europy</h3>
                                    <p>Osiedlenie się w Göteborg, ostatnie kompozycje</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-date">1998</div>
                                <div class="timeline-content">
                                    <h3>Śmierć kompozytora</h3>
                                    <p>Roman Maciejewski umiera 30 kwietnia w Göteborg</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>
        
        <!-- Stopka strony -->
        <?php include('includes/footer.php'); ?>
    </div>

    <script src="js/script.js"></script>
    <script>
    document.head.insertAdjacentHTML('beforeend', `
    <style>
        .biography-page {
            padding: 2rem 0;
        }
        
        .biography-content {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .biography-main-image {
            width: 300px;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            margin-right: 2rem;
            float: left;
            shape-outside: margin-box;
            margin-bottom: 2rem;
        }
        
        .biography-text {
            flex: 1;
            min-width: 300px;
        }
        
        .biography-text h2 {
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            color: #0056b3;
        }
        
        .biography-text p {
            margin-bottom: 1.25rem;
            line-height: 1.8;
        }
        
        .timeline {
            margin-top: 4rem;
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 8px;
        }
        
        .timeline-list {
            position: relative;
            margin-top: 2rem;
            padding-left: 2rem;
        }
        
        .timeline-list::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #0056b3;
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 2.5rem;
            padding-left: 2rem;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -10px;
            top: 5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #0056b3;
        }
        
        .timeline-date {
            font-weight: 600;
            color: #0056b3;
            margin-bottom: 0.5rem;
        }
        
        .timeline-content h3 {
            margin-bottom: 0.5rem;
        }
        
        .timeline-content p {
            margin-bottom: 0;
            color: #666;
        }
        
        @media (max-width: 768px) {
            .biography-main-image {
                float: none;
                margin: 0 auto 2rem;
                width: 100%;
                max-width: 300px;
                display: block;
            }
        }
    </style>
    `);
    </script>
</body>
</html>
