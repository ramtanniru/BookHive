<?php
// Check if the query number is set
if (isset($_POST['query'])) {
    // Get the query number
    $queryNumber = $_POST['query'];

    // Perform the query based on the query number
    switch ($queryNumber) {
        case '1':
            // Query 1: Retrieve all books by a specific author
            // Replace 'author_name' with the actual author name
            $authorName = 'T.J.Klune';
            $sql = "SELECT * FROM Books WHERE AuthorID = (Select AuthorID from Authors WHERE Name= '$authorName')";
            
            // Execute the query and display the result
            // ...
            break;

        case '2':
            // Query 2: Retrieve the average price of books in each category
            $sql = "SELECT c.Name AS Category, AVG(b.Price) AS AveragePrice
            FROM Books b
            JOIN Categories c ON b.CategoryID = c.CategoryID
            GROUP BY c.Name;
            ";
            // Execute the query and display the result
            // ...
            break;

        case '3':
            // Query 3: Retrieve the top 5 bestselling books
            $sql = "SELECT b.Title, COUNT(o.BookID) AS SalesCount
            FROM Books b
            JOIN Order_Items o ON b.BookID = o.BookID
            GROUP BY b.Title
            ORDER BY SalesCount DESC
            LIMIT 5;
            ";
            // Execute the query and display the result
            // ...
            break;

        case '4':
            // Query 4: Retrieve the customers who have purchased the most books
            $sql = "SELECT Customers.CustomerID, Customers.Name, COUNT(Orders.OrderID) AS TotalOrders
                    FROM Customers
                    INNER JOIN Orders ON Customers.CustomerID = Orders.CustomerID
                    GROUP BY Customers.CustomerID
                    ORDER BY TotalOrders DESC";
            // Execute the query and display the result
            // ...
            break;

        case '5':
            // Query 5: Retrieve the books with the highest and lowest prices
            $sql = "SELECT * FROM Books
                    WHERE Price = (SELECT MAX(Price) FROM Books)
                    UNION
                    SELECT * FROM Books
                    WHERE Price = (SELECT MIN(Price) FROM Books)";
            // Execute the query and display the result
            // ...
            break;

        case '6':
            // Query 6: Retrieve the books in the user's cart
            // Replace 'user_id' with the actual user ID
            $userId = 123;
            $sql = "SELECT Books.* FROM Books
                    INNER JOIN Cart ON Books.BookID = Cart.BookID
                    WHERE Cart.UserID = '$userId'";
            // Execute the query and display the result
            // ...
            break;

        default:
            // Invalid query number
            header("Location: index.php?result=Invalid query number");
            exit();
    }

    // Execute the query and display the result
    // ...
    // Replace the following code with your database connection and query execution code
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'bookhive';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $result = $conn->query($sql);

    if ($result) {
        // Display the query result
        while ($row = $result->fetch_assoc()) {
            // Output the result based on your requirements
            echo '<p>' . $row['Category'] . " = " . $row['AveragePrice'] . '</p>';
        }
    } else {
        // Error executing the query
        echo 'Error: ' . $conn->error;
    }

    $conn->close();
} else {
    // No query number provided
    header("Location: others.php?result=No query number provided");
    exit();
}
?>