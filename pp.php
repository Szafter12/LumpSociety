<!DOCTYPE html>
<html lang="pl">

<head>
    <meta name="description" content="tutaj znajdziecie mapke położenia naszych sklepów stacjonarnych">
    <title>Polityka Prywatności</title>
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

    <h1 class="bold">Polityka Prywatności</h1>
    <section class="shops wrapper section-padding flex-center">
        <div class="point flex-center">
            <h2 class="bold mb-4">ADMINISTRATOR DANYCH</h2>
            <p>
                Administratorem danych w sklepie internetowym pod adresem www.lumpsociety.com jest firma lump society, z
                siedzibą w Krakowie(kod pocztowy: 28-743), ul. Essa 420.
            </p>
        </div>
        <div class="point flex-center">
            <h2 class="bold mb-4">PRZETWARZANIE DANYCH OSOBOWYCH</h2>
            <p>
                Dane osobowe podane przy rejestracji konta klienta, bądź przy złożeniu zamówienia są niezbędne do
                wysyłki produktu do kupującego. Imię, nazwisko, adres, adres e-mail, oraz nr tel. są przekazywane firmie
                kurierskiej przy nadawaniu paczek, aby zamówienie doszło do klienta. Adres e-mail niezbędny jest również
                do wysyłania informacji odnośnie kolejnych statusów zamówienia, oraz do kontaktu z klientem. Każdy
                klient, w każdej chwili może poprosić o usunięcie jego danych z systemu. W razie takiej potrzeby prosimy
                o kontakt na nasz e-mail: contact@lumpsociety.com
            </p>
        </div>
        <div class="point flex-center">
            <h2 class="bold mb-4">POLITYKA COOKIES</h2>
            <p>
            <ol>
                <li>Sklep nie zbiera w sposób automatyczny żadnych informacji, z wyjątkiem informacji zawartych w plikach cookies.</li>
                <li>Pliki cookies (tak zwane „ciasteczka”) stanowią dane informatyczne, w szczególności pliki tekstowe, które przechowywane są w urządzeniu końcowym Użytkownika Sklepu i przeznaczone są do korzystania ze stron internetowych Sklepu. Cookies zazwyczaj zawierają nazwę strony internetowej, z której pochodzą, czas przechowywania ich na urządzeniu końcowym oraz unikalny numer.</li>
                <li>Podmiotem zamieszczającym na urządzeniu końcowym Użytkownika Sklepu pliki cookies oraz uzyskującym do nich dostęp jest operator Sklepu.</li>
                <li>
                    Pliki cookies wykorzystywane są w celu:
                    <ul>
                        <li>dostosowania zawartości stron internetowych Sklepu do preferencji Użytkownika oraz optymalizacji korzystania ze stron internetowych; w szczególności pliki te pozwalają rozpoznać urządzenie Użytkownika Sklepu i odpowiednio wyświetlić stronę internetową, dostosowaną do jego indywidualnych potrzeb;</li>
                        <li>tworzenia statystyk, które pomagają zrozumieć, w jaki sposób Użytkownicy Sklepu korzystają ze stron internetowych, co umożliwia ulepszanie ich struktury i zawartości;</li>
                    </ul>
                </li>
                <li>W ramach Sklepu stosowane są dwa zasadnicze rodzaje plików cookies: „sesyjne” (session cookies) oraz „stałe” (persistent cookies). Cookies „sesyjne” są plikami tymczasowymi, które przechowywane są w urządzeniu końcowym Użytkownika do czasu opuszczenia strony internetowej lub wyłączenia oprogramowania (przeglądarki internetowej). „Stałe” pliki cookies przechowywane są w urządzeniu końcowym Użytkownika przez czas określony w parametrach plików cookies lub do czasu ich usunięcia przez Użytkownika.</li>
                <li>W ramach Sklepu stosowane są następujące rodzaje plików cookies
                    <ul>
                        <li>„niezbędne” pliki cookies, umożliwiające korzystanie z usług dostępnych w ramach Sklepu, np. uwierzytelniające pliki cookies wykorzystywane do usług wymagających uwierzytelniania w ramach Sklepu;</li>
                        <li>pliki cookies służące do zapewnienia bezpieczeństwa, na przykład wykorzystywane do wykrywania nadużyć w zakresie uwierzytelniania w ramach Sklepu;</li>
                        <li>„wydajnościowe” pliki cookies, umożliwiające zbieranie informacji o sposobie korzystania ze stron internetowych Sklepu;</li>
                        <li>„funkcjonalne” pliki cookies, umożliwiające „zapamiętanie” wybranych przez Użytkownika ustawień i personalizację interfejsu Użytkownika, np. w zakresie wybranego języka lub regionu, z którego pochodzi Użytkownik, rozmiaru czcionki, wyglądu strony internetowej itp.;</li>
                        <li>„reklamowe” pliki cookies, umożliwiające dostarczanie Użytkownikom treści reklamowych bardziej dostosowanych do ich zainteresowań.</li>
                    </ul>
                </li>
                <li>W wielu przypadkach oprogramowanie służące do przeglądania stron internetowych (przeglądarka internetowa) domyślnie dopuszcza przechowywanie plików cookies w urządzeniu końcowym Użytkownika. Użytkownicy Sklepu mogą dokonać w każdym czasie zmiany ustawień dotyczących plików cookies. Ustawienia te mogą zostać zmienione w szczególności w taki sposób, aby blokować automatyczną obsługę plików cookies w ustawieniach przeglądarki internetowej bądź informować o ich każdorazowym zamieszczeniu w urządzeniu Użytkownika Sklepu. Szczegółowe informacje o możliwości i sposobach obsługi plików cookies dostępne są w ustawieniach oprogramowania (przeglądarki internetowej).</li>
                <li>Operator Sklepu informuje, że ograniczenia stosowania plików cookies mogą wpłynąć na niektóre funkcjonalności dostępne na stronach internetowych Sklepu.</li>
                <li>Pliki cookies zamieszczane w urządzeniu końcowym Użytkownika Sklepu i wykorzystywane mogą być również przez współpracujących z operatorem Sklepu reklamodawców oraz partnerów.</li>
            </ol>
            </p>
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