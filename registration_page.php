<!DOCTYPE html>
<html lang="pl">

<head>
    <meta name="description" content="Zaloguj się do swojego panelu urzytkownika">
    <title>Rejestracja</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jakub Pachut">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97392591bc.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./dist/css/style.min.css">

</head>

<body>

    <div class="info flex-center">
        <p class="info1 hide">Darmowa dostawa do zamówień powyżej 600 PLN 🚚</p>
        <p class="info2">Zamów do 13:00, a Twoje zamówienie zostanie dostarczone w następny dzień roboczy 🚚</p>
    </div>


    <header class="header">
        <div class="header__brand">
            <a href="#">Lump <span>Society</span><span class="r-mark">®</span></a>
        </div>
    </header>
    <nav class="nav">
        <div class="mobile-menu">
            <button class="burgerBtn">
                <div class="bars"></div>
            </button>
            <div class="nav__items-mobile">
                <span><a href="./index.php" class="nav__item">Home</a></span>
                <span><a href="./shop.php" class="nav__item">Shop</a></span>
                <span><a href="./size-chart.php" class="nav__item">Size Chart</a></span>
                <span><a href="./contact.php" class="nav__item">Contact</a></span>
            </div>
        </div>
        <div class="nav__items">
            <a href="./index.php" class="nav__item">Home</a>
            <a href="./shop.php" class="nav__item">Shop</a>
            <a href="./size-chart.php" class="nav__item">Size Chart</a>
            <a href="./contact.php" class="nav__item">Contact</a>
        </div>
        <div class="nav__ui">
        <?php
            session_start();
            if (isset($_SESSION['user_id']) && ($_SESSION['is_admin'] == 1)) {
                echo "<a href='./admin_panel.php' class='nav__btn login-btn'><i class='fa-solid fa-user'></i></a>";
            } else if (isset($_SESSION['user_id']) && ($_SESSION['is_admin'] != 1)) {
                // Użytkownik jest zalogowany, wyświetl jego profil
                echo "<a href='./user_panel.php' class='nav__btn login-btn'><i class='fa-solid fa-user'></i></a>";
            } else {
                // Użytkownik nie jest zalogowany, wyświetl formularz logowania
                echo "<a href='./login_page.php' class='nav__btn login-btn'><i class='fa-solid fa-user'></i></a>";
            }
            ?>
            <button class="nav__btn cart-btn" aria-label="cart"><i class="fa-solid fa-cart-shopping"></i></button>
        </div>
    </nav>
    <button class="scroll-up flex-center">
        <i class="fa-solid fa-chevron-up"></i>
    </button>
    <div class="cart">
        <div class="cart__body">
            <button class="close-btn">
                <div class="line1"></div>
                <div class="line2"></div>
            </button>
            <div class="cart__inside wrapper section-padding">
                <h2 class="section-title">Koszyk <i class="fa-solid fa-cart-shopping"></i></h2>
                <div class="cart__content ">
                    <p class="cart__info">twój koszyk jest pusty</p>
                </div>
            </div>
        </div>
    </div>



    <section class="wrapper section-padding flex-center">
        <div class="login">
            <h1 class='bold'>Zarejestruj się</h1>
            <form action="php/addUser.php" method="post" class="login__form">
                <input type="text" class="login__input" placeholder="imię" name="name" required>
                <input type="email" class="login__input" placeholder="e-mail" name="email" required>
                <input type="password" class="login__input" placeholder="hasło" name="password" required>
                <button class="login__btn" type="submit" id="registerBtn">Zarejestruj się</button>
            </form>
            <p class="info mt-5">Masz już konto?<a href="./login_page.php" class="link p-2"> Zaloguj się </a></p>
        </div>
    </section>

    <footer class="footer section-padding">
        <div class="wrapper footer__content">
            <div class="footer__links">
                <div class="brand">
                    <p class="footer__title">Marka:</p>
                    <a class="link" href="./about_us.php">About us</a>
                    <a class="link" href="./contact.php">Contact</a>
                    <a class="link" href="./shops.php">Sklepy</a>
                    <a class="link" href="./FAQ.php">FAQ</a>
                </div>
                <div class="customer-service">
                    <p class="footer__title">Obsługa klienta:</p>
                    <a href="./pp.php" class="link">Polityka Prywatności</a>
                    <a href="./return.php" class="link">Zwroty i reklamacje</a>
                    <a href="./ship.php" class="link">Wysyłka</a>
                </div>
            </div>
            <div class="footer__socials">
                <p>Follow us on:</p>
                <span>
                    <a href="https://www.facebook.com/profile.php?id=100076352437709"><i class="fa-brands fa-facebook" target="_blank"></i></a>
                    <a href="https://sadeczanin.info/rozmaitosci/falszywy-patron-w-googlowskich-mapach-piotr-ladyga-trolluje-tez-w-nowym-saczu" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.youtube.com/watch?v=OjNpRbNdR7E" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                </span>
                <p>COPYRIGHT &copy; <span class="year"></span> | LUMP SOCIETY</p>
            </div>
        </div>
        <div class="white-block"></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./dist/js/main.min.js"></script>
</body>

</html>