<?php
session_start();
require 'database_connection.php'; // Plik z połączeniem do bazy danych

if (!isset($_SESSION['user_id'])) {
    header('Location: login_page.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$query = $conn->prepare("SELECT products.product_id, products.name, products.price, products.photo_url, products.photo_alt, cart.quantity FROM cart JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = ?");
$query->bind_param('i', $user_id);
$query->execute();
$result = $query->get_result();

$total_price = 0;
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta name="description" content="Zaloguj się do swojego panelu urzytkownika">
    <title>Panel Użytkownika</title>
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
    <style>
        label {
            align-self: flex-start;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 0.5em;
        }
    </style>
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
            require 'database_connection.php';
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
            <a href="cart.php" class="nav__btn cart-btn"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </nav>
    <button class="scroll-up flex-center">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    <section class="wrapper section-padding flex-center">
        <div class="user-panel">
            <a href="#" class="cart__btn cart__btn--a">Zamawiam</a>
            <h1>Dane Zamówienia</h1>
            <div class="delivery">
                <form action="php/addUser.php" method="post" class="login__form">
                    <input type="text" class="login__input" placeholder="adres1" name="adres1" required>
                    <input type="text" class="login__input" placeholder="Adres2" name="adres2" required>
                    <input type="text" class="login__input" placeholder="Miejscowość" name="twon" required>
                    <input type="text" class="login__input" placeholder="Kod pocztowy" name="post-code" required>
                    <br><br>
                    <h2>Przesyłka</h2>
                    <label>
                        <input type="radio" name="delivery-option" value="Inpost Paczkomaty 24/7">
                        <p>Inpost Paczkomaty 24/7 (11.99zł)</p>
                    </label>
                    <label>
                        <input type="radio" name="delivery-option" value="Kurdier DPD">
                        <p>Kurier DPD (16.99zł)</p>
                    </label>
                    <label>
                        <input type="radio" name="delivery-option" value="Przesyłka Pocztowa">
                        <p>Przesyłka Pocztowa (12.49zł)</p>
                    </label>
                    <br><br>
                    <h2>Płatność</h2>

                    <label>
                        <input type="radio" name="payment" value="Tradicional">
                        <p>Tradycyjny Przelew Bankowy</p>
                    </label>
                    <label>
                        <input type="radio" name="payment" value="PayU">
                        <p>Szybka Płatność Bankowa/Blik</p>
                    </label>
                    <label>
                        <input type="radio" name="payment" value="OnDelivery">
                        <p>Płatność Przy Odbiorze</p>
                    </label>
                </form>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
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