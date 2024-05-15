<?php
session_start();

// Połącz się z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lump_society";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Pobierz dane z formularza
$email = $_POST['email'];
$password = $_POST['password'];

// Zabezpiecz dane przed atakami SQL Injection
$email = mysqli_real_escape_string($conn, $email);

// Wyszukaj użytkownika w bazie danych
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Sprawdź poprawność hasła
    if (password_verify($_POST['password'], $row['password'])) {
        // Ustaw sesję użytkownika
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_email'] = $row['email'];
        header("Location: ../user_panel.php"); // Przekieruj na stronę główną
    } else {
        echo "Nieprawidłowe hasło.";
    }
} else {
    echo "Użytkownik o podanym adresie e-mail nie istnieje.";
}

$conn->close();
