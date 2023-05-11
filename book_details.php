<?php
session_start();

// Check if the book ID is provided
if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    // Add the book to the cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the book is already in the cart
    if (!in_array($bookId, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $bookId;
    }
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

    $sql = "Insert into Order_Items(BookID,Price,Quantity) values ('$bookId',(Select Price from Books where BookID='$bookId'),1);";
    $res = $conn->query($sql);
    $conn->close();

    // Redirect the user to the cart page or any other appropriate page
    header("Location: home.php");
    exit();
}
?>