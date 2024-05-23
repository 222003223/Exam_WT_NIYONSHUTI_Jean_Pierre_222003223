<?php


// Include database connection file
require_once "config.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO newsletter_subscriptions (newsletter_subscriptions) VALUES (?)");
    $stmt->bind_param("s", $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "You have successfully subscribed to our newsletter!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
