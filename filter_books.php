<?php
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

// Get the filter query from the AJAX request
$filterQuery = isset($_GET['filter']) ? $_GET['filter'] : '';

// Build the SQL query with the filter
$sql = 'SELECT BookID, Title, Price, ImageURL,
        (SELECT Name FROM Authors WHERE Authors.AuthorID = Books.AuthorID) AS Name
        FROM Books ' . $filterQuery;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<li>
                <div class="book">
                    <img src=' . $row['ImageURL'] . ' alt="' . $row['Title'] . '">
                    <h3>' . $row['Title'] . '</h3>
                    <p>Author: ' . $row['Name'] . '</p>
                    <p class="price">$' . $row['Price'] . '</p>
                    <a href="book_details.php?book_id=' . $row['BookID'] . '" class="add-to-cart">Add to Cart</a>
                </div>
              </li>';
    }
} else {
    echo 'No books found.';
}
$conn->close();
?>