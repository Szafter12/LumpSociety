<!DOCTYPE html>
<html lang="pl">

<head>
    <meta name="description" content="Wszystkie produkty dostępne w sklepie">
    <title>All</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jakub Pachut">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97392591bc.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./dist/css/style.min.css">
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lump_society";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }
    ?>

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
                <span><a href="./all.php" class="nav__item">Shop</a></span>
                <span><a href="./size-chart.html" class="nav__item">Size Chart</a></span>
                <span><a href="./contact.html" class="nav__item">Contact</a></span>
            </div>
        </div>
        <div class="nav__items">
            <a href="./index.php" class="nav__item">Home</a>
            <a href="./all.php" class="nav__item">Shop</a>
            <a href="./size-chart.html" class="nav__item">Size Chart</a>
            <a href="./contact.html" class="nav__item">Contact</a>
        </div>
        <div class="nav__ui">
            <button class="nav__btn login-btn" aria-label="login"><i class="fa-solid fa-user"></i></button>
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
    <?php

    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        echo "<h1 class='bold'>" . $category . "</h1>";
    } else {
        $category = 'all';
        echo "<h1 class='bold'>" . $category . "</h1>";
    }
    ?>

    <section class="products section-padding wrapper">
        <ul class="products__category">
            <li><a href="./shop.php" class="link">All</a></li>
            <li><a href="./shop.php?category=tops" class="link">Tops</a></li>
            <li><a href="./shop.php?category=bottoms" class="link">Bottoms</a></li>
            <li><a href="./shop.php?category=accesories" class="link">Accesories</a></li>
        </ul>
        <div class="new-items">
            <?php

            if (isset($_GET['category'])) {
                $category = $_GET['category'];
            } else {

                $category = 'all';
            }

            if ($category == 'all') {
                $sql = "SELECT * FROM products";
            } else {
                $sql = "SELECT * FROM products WHERE category = '$category'";
            }
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a href='#' id='" . $row['product_id'] . "'>";
                    echo "<div class='item'>";
                    echo "<div class='item__top'>";
                    echo "<img src='" . $row['photo_url'] . "' alt='" . $row['name'] . "'>";
                    echo "</div>";
                    echo " <div class='item__bot'>";
                    echo "<span class='item__name'>" . $row['name'] . "</span>";
                    echo "<span class='item__price'>" . $row['price'] . "</span>";
                    echo "</div>";
                    echo "</div>";
                    echo "</a>";
                }
            } else {
                echo "<p class='bold'>Brak produktów do wyświetlenia.</p>";
            }
            ?>
        </div>
    </section>

    <footer class="footer section-padding">
        <div class="wrapper footer__content">
            <div class="footer__links">
                <div class="customer-service">
                    <p class="footer__title">Obsługa klienta:</p>
                    <a href="./regulamin.html" class="link">Regulamin</a>
                    <a href="./polityka_prywatnosci.html" class="link">Polityka Prywatności</a>
                    <a href="./zwroty.html" class="link">Zwroty i reklamacje</a>
                    <a href="./wysylka.html" class="link">Wysyłka</a>
                </div>
                <div class="brand">
                    <p class="footer__title">Marka:</p>
                    <a class="link" href="./about_us.html">About us</a>
                    <a class="link" href="./contact.html">Contact</a>
                    <a class="link" href="./sklepy.html">Sklepy</a>
                    <a class="link" href="./FAQ.html">FAQ</a>
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