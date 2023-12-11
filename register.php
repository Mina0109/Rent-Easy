<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST['user_type'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Storing the password in plain text

    $sql = "INSERT INTO user (user_type, name, contact, email, password) VALUES ('$user_type', '$name', '$contact', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New user registered successfully. Please <a href='index.html'>log in</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>