<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lump_society";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$name = $_POST['name'];
$price = $_POST['price'];
$photo_url = $_POST['photo_url'];
$photo_alt = $_POST['photo_alt'];
$stock_quantity = $_POST['stock_quantity'];
$category = $_POST['category'];

$sql = "INSERT INTO products (name, price, photo_url, photo_alt, stock_quantity, category)
VALUES ('$name', '$price', '$photo_url', '$photo_alt', '$stock_quantity', '$category')";

if ($conn->query($sql) === TRUE) {
    header("location: ../admin_panel.php");
} else {
    echo "Błąd: " . $sql . "<br>" . $conn->error;
}

$conn->close();
