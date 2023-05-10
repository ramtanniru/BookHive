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

    // Redirect the user back to the book details page or the cart page
    header("Location: book_details.php?book_id=$bookId");
    exit();
}
?>
