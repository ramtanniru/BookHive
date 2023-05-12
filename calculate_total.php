<?php
session_start();

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $bookIds = $_SESSION['cart'];

    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'bookhive';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql = 'SELECT SUM(Price) AS TotalPrice FROM Books WHERE BookID IN (' . implode(',', $bookIds) . ')';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalPrice = $row['TotalPrice'];
        echo $totalPrice;
    } else {
        echo '0';
    }

    $conn->close();
} else {
    echo '0';
}
?>
