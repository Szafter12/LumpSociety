<?php
session_start();
require '../database_connection.php'; // Plik z połączeniem do bazy danych

if (!isset($_SESSION['user_id'])) {
    // Użytkownik nie jest zalogowany, przekierowanie do logowania
    header('Location: ../login_page.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// Sprawdzenie, czy produkt już jest w koszyku
$query = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
$query->bind_param('ii', $user_id, $product_id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    // Produkt już jest w koszyku, zwiększamy ilość
    $query = $conn->prepare("UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?");
    $query->bind_param('ii', $user_id, $product_id);
} else {
    // Produkt nie jest w koszyku, dodajemy nowy wpis
    $query = $conn->prepare("INSERT INTO cart (user_id, product_id) VALUES (?, ?)");
    $query->bind_param('ii', $user_id, $product_id);
}

$query->execute();
header('Location: ../cart.php');
exit();
