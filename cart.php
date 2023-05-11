<?php
session_start();

// Check if the cart exists in the session
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo 'Your cart is empty.';
} else {
    // Retrieve the book IDs from the cart
    $bookIds = $_SESSION['cart'];

    // Retrieve the book details from the database based on the book IDs
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

    // Build the SQL query to retrieve the book details
    $sql = 'SELECT BookID, Title, Price FROM Books WHERE BookID IN (' . implode(',', $bookIds) . ')';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['Title'] . '</td>
                    <td>$' . $row['Price'] . '</td>
                  </tr>';
        }

        echo '</table>';
    } else {
        echo 'No books found in your cart.';
    }

    $conn->close();
}
?>
