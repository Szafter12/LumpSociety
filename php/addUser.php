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
$email = $_POST['email'];
$password = $_POST['password'];

$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$password_hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email','$password_hashed')";
if ($conn->query($sql) === TRUE) {
    header("Location: ../after_register.php");
} else {
    echo "Błąd podczas rejestracji użytkownika: " . $conn->error;
}

$conn->close();
