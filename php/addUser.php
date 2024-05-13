<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lump_society";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$password_hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO `users`(`email`, `password`) VALUES ('$email','$password_hashed')";
if ($conn->query($sql) === TRUE) {
    echo "Użytkownik został pomyślnie zarejestrowany.";
} else {
    echo "Błąd podczas rejestracji użytkownika: " . $conn->error;
}

$conn->close();
