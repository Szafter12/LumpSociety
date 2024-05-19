<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lump_society";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

if (isset($_GET['mode'])) {
    if ($_GET['mode'] == 'usun') {
        $query = "DELETE FROM pytania WHERE id='{$_GET['id']}' ";
        $connect->query($query);
    }
    if ($_GET['mode'] == 'modyfikuj') {
        $query = "UPDATE pytania SET tresc='{$_GET['tresc']}', kategoria='{$_GET['kategoria']}' WHERE id='{$_GET['id']}'";
        $connect->query($query);
    }

    if ($_GET['mode'] == 'dodaj') {
        $query = "INSERT INTO `products`(`name`, `price`, `photo_url`, `photo_alt`, `stock_quantity`, `category`) VALUES ('{$_POST['name']}','{$_POST['price']}', '{$_POST['photo_url']}', '{$_POST['photo_alt']}', '{$_POST['stock_quantity']}', '{$_POST['category']}')";
        $connect->query($query);
        header("location: ../admin_panel.php");
    }
}

