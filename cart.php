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
        <div class="user-panel cart">
            <a href="#" class="cart__btn cart__btn--a">Przejdź dalej</a>
            <h1>Koszyk <i class="fa-solid fa-cart-shopping"></i></h1>
            <div class="products">
                <div class="new-items">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='item' href='product.php?product_id=" . $row['product_id'] . "'>";
                            echo "<div class='item__top'>";
                            echo "<img src='" . $row['photo_url'] . "' alt='" . $row['name'] . "'>";
                            echo "</div>";
                            echo " <div class='item__bot'>";
                            echo "<span class='item__name'>" . $row['name'] . "</span>";
                            echo "<span class='bold'>" . $row['price'] . " PLN</span>";
                            echo "<span>Ilość: " . $row['quantity'] . "</span>";
                            echo " <form action='php/remove_from_cart.php' method='POST'>";
                            echo "  <input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
                            echo " <button class='cart__btn' type='submit'>Usuń</button>";
                            echo " </form>";
                            echo "</div>";
                            echo "</div>";
                            $total_price += $row['price'] * $row['quantity'];
                        }
                        echo "</div>";
                        echo "</div>";
                        echo "<h2>Łączna cena: " . $total_price . " PLN</h2>";
                    } else {
                        echo "</div>";
                        echo "</div>";
                        echo "<h2 class='cart__info'>Twój koszyk jest pusty</h2>";
                    }
                    ?>
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