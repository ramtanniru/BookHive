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
                    <th>Action</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr id="bookRow_' . $row['BookID'] . '">
                    <td>' . $row['Title'] . '</td>
                    <td>$' . $row['Price'] . '</td>
                    <td><button onclick="deleteBook(' . $row['BookID'] . ')">Delete</button></td>
                  </tr>';
        }

        echo '</table>';
    } else {
        echo 'No books found in your cart.';
    }

    $conn->close();
}
?>

<script>
    function deleteBook(bookId) {
        if (confirm("Are you sure you want to delete this book?")) {
            // Delete the book details from the table displayed on the page
            var row = document.getElementById('bookRow_' + bookId);
            if (row) {
                row.parentNode.removeChild(row);
            }

            // Remove the book ID from the session cart array
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                // Retrieve the book ID to delete
                $bookIdToDelete = " + bookId + "; // Convert bookId to integer for PHP
            
                // Loop through the session cart array and remove the book ID
                foreach ($_SESSION['cart'] as $key => $cartBookId) {
                    if ($cartBookId == $bookIdToDelete) {
                        unset($_SESSION['cart'][$key]);
                        break;
                    }
                }

                // Optional: Reset the array keys to maintain consecutive numbering
                $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
            ?>
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_book.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send('bookId=' + bookId);
        }
    }
    <?php
    unset($_SESSION['cart']);
    ?>
</script>