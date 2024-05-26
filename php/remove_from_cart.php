<?php
session_start();
require '../database_connection.php'; // Plik z połączeniem do bazy danych

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login_page.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// Sprawdzenie obecnej ilości produktu w koszyku
$query = $conn->prepare("SELECT quantity FROM cart WHERE user_id = ? AND product_id = ?");
$query->bind_param('ii', $user_id, $product_id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $quantity = $row['quantity'];

    if ($quantity > 1) {
        // Zmniejszenie ilości o 1
        $query = $conn->prepare("UPDATE cart SET quantity = quantity - 1 WHERE user_id = ? AND product_id = ?");
        $query->bind_param('ii', $user_id, $product_id);
    } else {
        // Usunięcie produktu z koszyka, jeśli ilość wynosi 1
        $query = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
        $query->bind_param('ii', $user_id, $product_id);
    }
    $query->execute();
}

header('Location: ../cart.php');
exit();
