
<?php
// Panel użytkownika/administratora
session_start();

// Sprawdzenie czy użytkownik jest zalogowany
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$is_admin = $_SESSION['is_admin'] ?? false;
$username = $_SESSION['username'] ?? 'Użytkownik';

$title = "Panel Użytkownika";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Roman Maciejewski</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '.tinymce-editor',
        height: 400,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image'
      });
    </script>
    <!-- Google Charts dla statystyk -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawCharts);

      function drawCharts() {
        // Wykres odwiedzin
        var visitData = google.visualization.arrayToDataTable([
          ['Dzień', 'Odwiedziny'],
          ['Pon',  50],
          ['Wt',  65],
          ['Śr',  70],
          ['Czw', 55],
          ['Pt',  80],
          ['Sob', 90],
          ['Ndz', 95]
        ]);

        var visitOptions = {
          title: 'Liczba odwiedzin w ciągu tygodnia',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var visitChart = new google.visualization.LineChart(document.getElementById('visits_chart'));
        visitChart.draw(visitData, visitOptions);

        // Wykres pobrań
        var downloadsData = google.visualization.arrayToDataTable([
          ['Utwór', 'Pobrania'],
          ['Requiem', 30],
          ['Mazurki', 45],
          ['Pieśni Kurpiowskie', 25]
        ]);

        var downloadsOptions = {
          title: 'Pobrania utworów',
          pieHole: 0.4,
        };

        var downloadsChart = new google.visualization.PieChart(document.getElementById('downloads_chart'));
        downloadsChart.draw(downloadsData, downloadsOptions);
      }
    </script>
</head>
<body>
    <div class="container">
        <!-- Nagłówek strony -->
        <?php include('includes/header.php'); ?>
        
        <main class="panel-main">
            <div class="panel-sidebar">
                <div class="user-info">
                    <i class="fas fa-user-circle user-avatar"></i>
                    <h3><?php echo $username; ?></h3>
                    <p><?php echo $is_admin ? 'Administrator' : 'Użytkownik'; ?></p>
                </div>
                
                <nav class="panel-nav">
                    <ul>
                        <li class="active"><a href="#dashboard"><i class="fas fa-home"></i> Pulpit</a></li>
                        <li><a href="#profile"><i class="fas fa-user"></i> Profil</a></li>
                        <li><a href="#downloads"><i class="fas fa-download"></i> Moje pobrania</a></li>
                        <?php if ($is_admin): ?>
                            <li><a href="#content"><i class="fas fa-edit"></i> Zarządzanie treścią</a></li>
                            <li><a href="#music"><i class="fas fa-music"></i> Zarządzanie muzyką</a></li>
                            <li><a href="#users"><i class="fas fa-users"></i> Użytkownicy</a></li>
                            <li><a href="#stats"><i class="fas fa-chart-bar"></i> Statystyki</a></li>
                        <?php endif; ?>
                        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Wyloguj</a></li>
                    </ul>
                </nav>
            </div>
            
            <div class="panel-content">
                <!-- Sekcja widoczna domyślnie -->
                <section id="dashboard" class="panel-section">
                    <h1>Witaj, <?php echo $username; ?>!</h1>
                    <div class="dashboard-cards">
                        <div class="dashboard-card">
                            <div class="card-icon"><i class="fas fa-music"></i></div>
                            <div class="card-info">
                                <h3>Utwory</h3>
                                <p>3 dostępne</p>
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-icon"><i class="fas fa-download"></i></div>
                            <div class="card-info">
                                <h3>Pobrania</h3>
                                <p>5 twoich pobrań</p>
                            </div>
                        </div>
                        
                        <?php if ($is_admin): ?>
                            <div class="dashboard-card">
                                <div class="card-icon"><i class="fas fa-users"></i></div>
                                <div class="card-info">
                                    <h3>Użytkownicy</h3>
                                    <p>15 zarejestrowanych</p>
                                </div>
                            </div>
                            
                            <div class="dashboard-card">
                                <div class="card-icon"><i class="fas fa-eye"></i></div>
                                <div class="card-info">
                                    <h3>Odwiedziny</h3>
                                    <p>505 w tym tygodniu</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="recent-activity">
                        <h2>Ostatnia aktywność</h2>
                        <ul class="activity-list">
                            <li>
                                <div class="activity-icon"><i class="fas fa-download"></i></div>
                                <div class="activity-details">
                                    <p>Pobrałeś utwór <strong>Mazurki</strong></p>
                                    <span class="activity-time">2 godziny temu</span>
                                </div>
                            </li>
                            <li>
                                <div class="activity-icon"><i class="fas fa-sign-in-alt"></i></div>
                                <div class="activity-details">
                                    <p>Zalogowałeś się do systemu</p>
                                    <span class="activity-time">4 godziny temu</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
                
                <?php if ($is_admin): ?>
                    <!-- Sekcje widoczne tylko dla administratora -->
                    <section id="content" class="panel-section" style="display: none;">
                        <h1>Zarządzanie treścią</h1>
                        
                        <div class="content-editor">
                            <h2>Edycja strony głównej</h2>
                            <form method="POST" action="update_content.php">
                                <div class="form-group">
                                    <label for="page-title">Tytuł strony</label>
                                    <input type="text" id="page-title" name="page_title" value="Roman Maciejewski - Strona Główna">
                                </div>
                                
                                <div class="form-group">
                                    <label for="page-content">Zawartość strony</label>
                                    <textarea class="tinymce-editor" id="page-content" name="page_content">
                                        <h1>Roman Maciejewski</h1>
                                        <p>Poznaj twórczość wybitnego polskiego kompozytora</p>
                                        
                                        <h2>Wybitne Dzieła</h2>
                                        <!-- Przykładowa zawartość -->
                                    </textarea>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn">Zapisz zmiany</button>
                                </div>
                            </form>
                        </div>
                    </section>
                    
                    <section id="music" class="panel-section" style="display: none;">
                        <h1>Zarządzanie muzyką</h1>
                        
                        <div class="music-manager">
                            <div class="music-manager-header">
                                <h2>Utwory</h2>
                                <a href="#" class="btn add-music-btn"><i class="fas fa-plus"></i> Dodaj nowy utwór</a>
                            </div>
                            
                            <div class="music-upload-form" style="display: none;">
                                <h3>Dodaj nowy utwór</h3>
                                <form method="POST" action="add_music.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="music-title">Tytuł utworu</label>
                                        <input type="text" id="music-title" name="music_title" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="music-year">Rok powstania</label>
                                        <input type="text" id="music-year" name="music_year">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="music-description">Opis</label>
                                        <textarea id="music-description" name="music_description" rows="4" required></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="music-file">Plik audio (MP3)</label>
                                        <input type="file" id="music-file" name="music_file" accept="audio/mp3" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="music-image">Obraz okładki</label>
                                        <input type="file" id="music-image" name="music_image" accept="image/*">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="download_restricted" value="1" checked>
                                            Ograniczenie pobierania tylko dla zalogowanych użytkowników
                                        </label>
                                    </div>
                                    
                                    <div class="form-actions">
                                        <button type="submit" class="btn">Dodaj utwór</button>
                                        <button type="button" class="btn-outline cancel-upload">Anuluj</button>
                                    </div>
                                </form>
                            </div>
                            
                            <table class="music-table">
                                <thead>
                                    <tr>
                                        <th>Tytuł</th>
                                        <th>Rok</th>
                                        <th>Pobrania</th>
                                        <th>Status</th>
                                        <th>Akcje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Requiem</td>
                                        <td>1959</td>
                                        <td>30</td>
                                        <td><span class="status-active">Aktywny</span></td>
                                        <td>
                                            <a href="#" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="action-btn delete-btn"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mazurki</td>
                                        <td>1930-1950</td>
                                        <td>45</td>
                                        <td><span class="status-active">Aktywny</span></td>
                                        <td>
                                            <a href="#" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="action-btn delete-btn"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pieśni Kurpiowskie</td>
                                        <td>1948</td>
                                        <td>25</td>
                                        <td><span class="status-active">Aktywny</span></td>
                                        <td>
                                            <a href="#" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="action-btn delete-btn"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    
                    <section id="users" class="panel-section" style="display: none;">
                        <h1>Zarządzanie użytkownikami</h1>
                        
                        <div class="users-manager">
                            <div class="users-stats">
                                <div class="user-stat-card">
                                    <div class="stat-number">15</div>
                                    <div class="stat-label">Wszyscy użytkownicy</div>
                                </div>
                                <div class="user-stat-card">
                                    <div class="stat-number">3</div>
                                    <div class="stat-label">Nowi w tym tygodniu</div>
                                </div>
                                <div class="user-stat-card">
                                    <div class="stat-number">8</div>
                                    <div class="stat-label">Aktywni w tym tygodniu</div>
                                </div>
                            </div>
                            
                            <table class="users-table">
                                <thead>
                                    <tr>
                                        <th>Nazwa użytkownika</th>
                                        <th>Email</th>
                                        <th>Data rejestracji</th>
                                        <th>Pobrania</th>
                                        <th>Status</th>
                                        <th>Akcje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jan Kowalski</td>
                                        <td>jan@example.com</td>
                                        <td>15.05.2023</td>
                                        <td>12</td>
                                        <td><span class="status-active">Aktywny</span></td>
                                        <td>
                                            <a href="#" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="action-btn block-btn"><i class="fas fa-ban"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Anna Nowak</td>
                                        <td>anna@example.com</td>
                                        <td>20.06.2023</td>
                                        <td>5</td>
                                        <td><span class="status-active">Aktywny</span></td>
                                        <td>
                                            <a href="#" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="action-btn block-btn"><i class="fas fa-ban"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    
                    <section id="stats" class="panel-section" style="display: none;">
                        <h1>Statystyki i raporty</h1>
                        
                        <div class="stats-controls">
                            <div class="date-selector">
                                <label for="date-range">Zakres dat:</label>
                                <select id="date-range">
                                    <option value="7">Ostatnie 7 dni</option>
                                    <option value="30">Ostatnie 30 dni</option>
                                    <option value="90">Ostatnie 3 miesiące</option>
                                    <option value="365">Ostatni rok</option>
                                </select>
                            </div>
                            
                            <div class="export-controls">
                                <a href="export.php?format=pdf" class="btn-sm"><i class="fas fa-file-pdf"></i> Eksportuj PDF</a>
                                <a href="export.php?format=csv" class="btn-sm"><i class="fas fa-file-csv"></i> Eksportuj CSV</a>
                            </div>
                        </div>
                        
                        <div class="charts-container">
                            <div class="chart-card">
                                <div id="visits_chart" style="width: 100%; height: 400px;"></div>
                            </div>
                            
                            <div class="chart-card">
                                <div id="downloads_chart" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                        
                        <div class="stats-summary">
                            <h2>Podsumowanie</h2>
                            <div class="stats-grid">
                                <div class="stat-box">
                                    <div class="stat-title">Łączna liczba odwiedzin</div>
                                    <div class="stat-value">505</div>
                                    <div class="stat-change positive">+12% od poprzedniego okresu</div>
                                </div>
                                
                                <div class="stat-box">
                                    <div class="stat-title">Łączna liczba pobrań</div>
                                    <div class="stat-value">100</div>
                                    <div class="stat-change positive">+8% od poprzedniego okresu</div>
                                </div>
                                
                                <div class="stat-box">
                                    <div class="stat-title">Średni czas na stronie</div>
                                    <div class="stat-value">3:45</div>
                                    <div class="stat-change positive">+15% od poprzedniego okresu</div>
                                </div>
                                
                                <div class="stat-box">
                                    <div class="stat-title">Współczynnik konwersji</div>
                                    <div class="stat-value">2.8%</div>
                                    <div class="stat-change negative">-1% od poprzedniego okresu</div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                
                <!-- Sekcje widoczne dla wszystkich użytkowników -->
                <section id="profile" class="panel-section" style="display: none;">
                    <h1>Profil użytkownika</h1>
                    
                    <div class="profile-form">
                        <form method="POST" action="update_profile.php">
                            <div class="form-group">
                                <label for="username">Nazwa użytkownika</label>
                                <input type="text" id="username" name="username" value="<?php echo $username; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="użytkownik@example.com">
                            </div>
                            
                            <div class="form-group">
                                <label for="current-password">Aktualne hasło</label>
                                <input type="password" id="current-password" name="current_password">
                            </div>
                            
                            <div class="form-group">
                                <label for="new-password">Nowe hasło (pozostaw puste, aby nie zmieniać)</label>
                                <input type="password" id="new-password" name="new_password">
                            </div>
                            
                            <div class="form-group">
                                <label for="confirm-password">Potwierdź nowe hasło</label>
                                <input type="password" id="confirm-password" name="confirm_password">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn">Zapisz zmiany</button>
                            </div>
                        </form>
                    </div>
                </section>
                
                <section id="downloads" class="panel-section" style="display: none;">
                    <h1>Moje pobrania</h1>
                    
                    <table class="downloads-table">
                        <thead>
                            <tr>
                                <th>Utwór</th>
                                <th>Data pobrania</th>
                                <th>Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mazurki</td>
                                <td>24.07.2023, 15:30</td>
                                <td>
                                    <a href="download.php?id=2" class="action-btn download-btn"><i class="fas fa-download"></i> Pobierz ponownie</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Requiem</td>
                                <td>20.07.2023, 10:15</td>
                                <td>
                                    <a href="download.php?id=1" class="action-btn download-btn"><i class="fas fa-download"></i> Pobierz ponownie</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>
        </main>
        
        <!-- Stopka strony -->
        <?php include('includes/footer.php'); ?>
    </div>

    <script src="js/script.js"></script>
    <script>
    // Skrypt do obsługi panelu
    document.addEventListener('DOMContentLoaded', function() {
        // Przełączanie między zakładkami panelu
        const navLinks = document.querySelectorAll('.panel-nav a');
        const panelSections = document.querySelectorAll('.panel-section');
        
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                
                // Ukryj wszystkie sekcje
                panelSections.forEach(section => {
                    section.style.display = 'none';
                });
                
                // Pokaż wybraną sekcję
                document.getElementById(targetId).style.display = 'block';
                
                // Ustaw aktywny link
                navLinks.forEach(lnk => {
                    lnk.parentElement.classList.remove('active');
                });
                this.parentElement.classList.add('active');
            });
        });
        
        // Obsługa dodawania nowego utworu
        const addMusicBtn = document.querySelector('.add-music-btn');
        const musicUploadForm = document.querySelector('.music-upload-form');
        const cancelUploadBtn = document.querySelector('.cancel-upload');
        
        if (addMusicBtn && musicUploadForm && cancelUploadBtn) {
            addMusicBtn.addEventListener('click', function(e) {
                e.preventDefault();
                musicUploadForm.style.display = 'block';
            });
            
            cancelUploadBtn.addEventListener('click', function() {
                musicUploadForm.style.display = 'none';
            });
        }
    });
    </script>
</body>
</html>
