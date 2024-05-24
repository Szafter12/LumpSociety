<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lump_society";

// Utworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pobranie ID produktu do usunięcia
$product_id = $_POST['id'];

// Przygotowanie zapytania SQL do usunięcia produktu
$sql = "DELETE FROM products WHERE product_id = '$product_id'";

if ($conn->query($sql) === TRUE) {
    header("location: ../admin_panel.php?product=deleted");
} else {
    echo "Błąd podczas usuwania produktu: " . $conn->error;
}

$conn->close();
