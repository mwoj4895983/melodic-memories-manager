
// Główny plik JavaScript dla strony Romana Maciejewskiego

document.addEventListener('DOMContentLoaded', function() {
    // Obsługa mobilnego menu
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    const authButtons = document.querySelector('.auth-buttons');

    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function() {
            mainNav.classList.toggle('mobile-active');
            authButtons.classList.toggle('mobile-active');
            
            // Zmiana ikony przycisku menu
            const icon = this.querySelector('i');
            if (icon.classList.contains('fa-bars')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    }

    // Płynne przewijanie do sekcji po kliknięciu w link nawigacyjny
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            
            // Sprawdź, czy link prowadzi do sekcji na aktualnej stronie
            if (targetId.startsWith('#') && targetId.length > 1) {
                e.preventDefault();
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Odsunięcie od górnej krawędzi
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Dodatkowe style dla nagłówka przy przewijaniu
    const header = document.querySelector('header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // Animacje przy przewijaniu
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.work-card, .music-card, .bio-content, .section-intro');
        
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementPosition < windowHeight - 100) {
                element.classList.add('visible');
            }
        });
    };

    // Wywołaj animację przy załadowaniu strony
    animateOnScroll();
    
    // Nasłuchuj zdarzenia przewijania
    window.addEventListener('scroll', animateOnScroll);
});

// Dodatkowe style CSS dla animacji
document.head.insertAdjacentHTML('beforeend', `
<style>
    .work-card, .music-card, .bio-content, .section-intro {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }
    
    .work-card.visible, .music-card.visible, .bio-content.visible, .section-intro.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .main-nav.mobile-active, .auth-buttons.mobile-active {
        display: flex;
        flex-direction: column;
        width: 100%;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 50;
        padding: 1rem;
    }
    
    .main-nav.mobile-active ul {
        flex-direction: column;
        width: 100%;
    }
    
    .main-nav.mobile-active li {
        margin: 0.5rem 0;
        width: 100%;
    }
    
    .main-nav.mobile-active a {
        display: block;
        padding: 0.75rem;
        text-align: center;
        width: 100%;
    }
    
    .auth-buttons.mobile-active {
        flex-direction: column;
        top: calc(100% + 200px);
    }
    
    .auth-buttons.mobile-active a {
        margin: 0.5rem 0;
        width: 100%;
        text-align: center;
    }
    
    header.scrolled {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }
    
    header.scrolled .header-content {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }
</style>
`);
