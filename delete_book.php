// delete_book.php

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the book ID from the AJAX request
    $bookId = $_POST['bookId'];

    // Perform the deletion in the database using the received book ID
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'bookhive';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Build the SQL query to delete the book from the database
    $sql = 'DELETE FROM Order_Items WHERE BookId = ' . $bookId;
    $result = $conn->query($sql);

    $conn->close();

    // Send a response back to the JavaScript function
    echo json_encode(['success' => true]);
    exit;
}
?>