<?php
session_start();

// Check if the cart exists in the session and has books
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Database connection details
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'bookhive';
    $bookIds = $_SESSION['cart'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Generate an Order ID
    $orderId = uniqid('ORDER');

    // Get the current date and time
    $orderDate = date('Y-m-d H:i:s');

    // Get the customer ID (you need to modify this based on your application)
    $customerId = 'SELECT CategoryID FROM Books WHERE BookID IN (' . implode(',', $bookIds) . ')';

    $sql = "Insert into Orders (OrderID, OrderDate, CustomerID, TotalCost) values($orderId,$orderDate,(Select CustomerId from Books where BookID =)";

    // Prepare the SQL statement to insert the order details
    $sql = "INSERT INTO ORDERS (OrderID, OrderDate, CustomerID, TotalCost) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssd", $orderId, $orderDate, $customerId, $totalCost);

    // Calculate the total cost by retrieving the book prices from the database
    $totalCost = 0;
    $bookIds = $_SESSION['cart'];

    foreach ($bookIds as $bookId) {
        $sql = "SELECT Price FROM Books WHERE BookID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $bookId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $price = $row['Price'];

        $totalCost += $price;
    }

    // Execute the SQL statement to insert the order details
    if ($stmt->execute()) {
        echo 'Books purchased successfully!';
    } else {
        echo 'Error: Unable to purchase books.';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Your cart is empty.';
}
?>