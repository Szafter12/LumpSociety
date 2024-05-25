<!DOCTYPE html>
<html lang="pl">

<head>
    <meta name="description" content="Zaloguj się do swojego panelu urzytkownika">
    <title>Panel Admina</title>
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
    <p class='msgStatus'>Produkt pomyślnie dodany</p>
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
        <div class="user-panel flex-center">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "lump_society";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Sprawdzenie, czy sesja jest ustawiona dla użytkownika
            if (isset($_SESSION['user_email']) && ($_SESSION['is_admin'] == 1)) {

                // Pobranie imienia użytkownika na podstawie danych sesji
                $email = $_SESSION['user_email'];
                $sql = "SELECT name FROM users WHERE email='$email'";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    // Wyświetlenie imienia użytkownika na stronie
                    $row = $result->fetch_assoc();
                    echo "<h1 class='bold'>Witaj " . $row["name"] . "</h1>";
                    echo "<a href='php/logout.php'>Wyloguj się</a>";
                    echo <<<form
                    <div class="admin-btns">
                        <button data-id="first-tab" onclick="showInfo('first-tab')" class="login__btn menu-tab menu-tab--active">Dodaj</button>
                        <button data-id="second-tab" onclick="showInfo('second-tab')" class="login__btn menu-tab">Usuń</button>
                        <button data-id="third-tab" onclick="showInfo('third-tab')" class="login__btn menu-tab">Modyfikuj</button>
                    </div>
                    <div class="menu-section section-padding wrapper" id="first-tab">
                        <h2 class="section-title">Dodaj Produkt</h2>
                        <form action="php/add_product.php" method="post" class="login__form">
                            <input type="text" class="login__input" placeholder="name" name="name" required>
                            <input type="text" class="login__input" placeholder="price" name="price" required>
                            <input type="text" class="login__input" placeholder="photo url" name="photo_url" required>
                            <input type="text" class="login__input" placeholder="photo alt" name="photo_alt" required>
                            <input type="number" class="login__input" placeholder="stock_quantity" name="stock_quantity" required>
                            <label for="category">Wybierz kategorie:</label>
                            <select id="category" name="category">
                                <option value="tops">tops</option>
                                <option value="bottoms">bottoms</option>
                                <option value="accesories">accesories</option>
                            </select>
                            <button class="login__btn" type="submit" name="add" value="add">Dodaj</button>
                        </form>
                        
                    </div>
                    <div class="menu-section products section-padding wrapper" id="second-tab" style="display: none">
                        <h2 class="section-title">Usuń Produkt</h2>
                        <div class="new-items">
                    form;
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "lump_society";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Błąd połączenia: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='item'>";
                            echo "<div class='item__top'>";
                            echo "<img src='" . $row['photo_url'] . "' alt='" . $row['name'] . "'>";
                            echo "</div>";
                            echo " <div class='item__bot'>";
                            echo "<span class='item__name'>" . $row['name'] . "</span>";
                            echo "<span class='bold'>" . $row['price'] . " PLN</span>";
                            echo "</div>";
                            echo "<form action='php/delete_product.php' method='post'>
                            <input type='hidden' name='id' value='" . $row['product_id'] . "'>
                            <input class='item__new' type='submit' value='Usuń'>
                          </form>";
                            echo "</div>";
                        }
                    } else {
                        echo "<h2>Brak produktów do wyświetlenia</h2>";
                    }
                    echo <<<form
                        </div>
                    </div>
                    <div class="menu-section products section-padding wrapper" id="third-tab" style="display: none">
                        <h2 class="section-title">Modyfikuj Produkt</h2>
                        <div class="new-items">
                    form;
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='item'>";
                            echo "<div class='item__top'>";
                            echo "<img src='" . $row['photo_url'] . "' alt='" . $row['name'] . "'>";
                            echo "</div>";
                            echo " <div class='item__bot'>";
                            echo "<span class='item__name'>" . $row['name'] . "</span>";
                            echo "<span class='bold'>" . $row['price'] . " PLN</span>";
                            echo "</div>";
                            echo "<form action='php/modify_product.php' method='post'>
                            <input type='hidden' name='id' value='" . $row['product_id'] . "'>
                            <input class='item__new' type='submit' value='Modyfikuj'>
                          </form>";
                            echo "</div>";
                        }
                    } else {
                        echo "<h2>Brak produktów do wyświetlenia</h2>";
                    }
                    echo "</div>";
                } else {
                    echo "<h1 class='bold'>Błąd podczas pobierania danych użytkownika.</h1>";
                }
            } else {
                header("location: login_page.php");
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