
<?php
// Plik z formularzem kontaktowym
session_start();

$title = "Kontakt - Roman Maciejewski";

$success = '';
$error = '';

// Obsługa formularza kontaktowego
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    
    // Podstawowa walidacja
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = 'Wszystkie pola formularza są wymagane.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Proszę podać poprawny adres email.';
    } else {
        // W rzeczywistej implementacji tutaj powinno być wysyłanie emaila
        // np. mail($to, $subject, $message, $headers);
        
        // Symulacja udanego wysłania
        $success = 'Dziękujemy za wiadomość! Odpowiemy najszybciej jak to możliwe.';
    }
}
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
            <section class="contact-page">
                <div class="layout-container">
                    <h1>Kontakt</h1>
                    
                    <div class="contact-content">
                        <div class="contact-info">
                            <h2>Informacje kontaktowe</h2>
                            <p>Masz pytania dotyczące Romana Maciejewskiego lub jego muzyki? Skontaktuj się z nami za pomocą formularza lub bezpośrednio.</p>
                            
                            <div class="contact-methods">
                                <div class="contact-method">
                                    <i class="fas fa-envelope"></i>
                                    <div>
                                        <h3>Email</h3>
                                        <p>info@maciejewski.pl</p>
                                    </div>
                                </div>
                                
                                <div class="contact-method">
                                    <i class="fas fa-phone"></i>
                                    <div>
                                        <h3>Telefon</h3>
                                        <p>+48 123 456 789</p>
                                    </div>
                                </div>
                                
                                <div class="contact-method">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div>
                                        <h3>Adres</h3>
                                        <p>ul. Muzyczna 10<br>00-001 Warszawa</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="social-media">
                                <h3>Media społecznościowe</h3>
                                <div class="social-icons">
                                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="contact-form-container">
                            <h2>Wyślij wiadomość</h2>
                            
                            <?php if (!empty($success)): ?>
                                <div class="success-message">
                                    <?php echo $success; ?>
                                </div>
                            <?php elseif (!empty($error)): ?>
                                <div class="error-message">
                                    <?php echo $error; ?>
                                </div>
                            <?php endif; ?>
                            
                            <form method="POST" action="kontakt.php" class="contact-form">
                                <div class="form-group">
                                    <label for="name">Imię i nazwisko</label>
                                    <input type="text" id="name" name="name" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="subject">Temat</label>
                                    <input type="text" id="subject" name="subject" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="message">Wiadomość</label>
                                    <textarea id="message" name="message" rows="6" required></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-full">Wyślij wiadomość</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="contact-map">
                        <h2>Nasza lokalizacja</h2>
                        <div class="map-container">
                            <!-- W rzeczywistej implementacji tutaj byłaby mapa Google, OpenStreetMap itp. -->
                            <div class="map-placeholder">
                                <p>Tu będzie mapa z lokalizacją</p>
                            </div>
                        </div>
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
        .contact-page {
            padding: 2rem 0;
        }
        
        .contact-content {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .contact-info, .contact-form-container {
            flex: 1;
            min-width: 300px;
        }
        
        .contact-info {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 8px;
        }
        
        .contact-methods {
            margin-top: 2rem;
        }
        
        .contact-method {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }
        
        .contact-method i {
            font-size: 1.5rem;
            color: #0056b3;
            margin-right: 1rem;
            width: 30px;
            text-align: center;
        }
        
        .contact-method h3 {
            margin-bottom: 0.25rem;
        }
        
        .contact-method p {
            margin-bottom: 0;
            color: #666;
        }
        
        .social-media {
            margin-top: 2rem;
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #0056b3;
            color: white;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background-color: #003d7a;
            transform: translateY(-3px);
            text-decoration: none;
        }
        
        .contact-form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }
        
        .contact-form .form-group {
            margin-bottom: 1.5rem;
        }
        
        .contact-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .contact-form textarea {
            resize: vertical;
        }
        
        .contact-map {
            margin-top: 4rem;
        }
        
        .map-container {
            height: 400px;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 1.5rem;
        }
        
        .map-placeholder {
            height: 100%;
            background-color: #f0f4f8;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            border: 1px dashed #ccc;
        }
        
        @media (max-width: 768px) {
            .contact-content {
                flex-direction: column;
            }
            
            .map-container {
                height: 300px;
            }
        }
    </style>
    `);
    </script>
</body>
</html>
