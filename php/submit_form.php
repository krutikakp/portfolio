<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$conn = new mysqli('localhost', 'root', '', 'portfolio');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO data (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    if ($stmt->execute()) {
        echo "Form submitted successfully.";
    } else {
        echo "Failed to submit the form.";
    }
    $stmt->close();
    $conn->close();
}
?>
