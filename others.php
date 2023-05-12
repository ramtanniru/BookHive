<!DOCTYPE html>
<html>

<head>
    <title>Bookstore Queries</title>
</head>

<body>
    <h1>Bookstore Queries</h1>
    <form method="post" action="execute_query.php">
        <button type="submit" name="query" value="1">Retrieve all books by a specific author</button><br><br>
        <button type="submit" name="query" value="2">Retrieve the average price of books in each
            category</button><br><br>
        <button type="submit" name="query" value="3">Retrieve the top 5 bestselling books</button><br><br>
        <button type="submit" name="query" value="4">Retrieve the customers who have purchased the most
            books</button><br><br>
        <button type="submit" name="query" value="5">Retrieve the books with the highest and lowest
            prices</button><br><br>
        <button type="submit" name="query" value="6">Retrieve the books in the user's cart</button><br><br>
    </form>

    <?php
    if (isset($_GET['result'])) {
        echo '<div id="result">' . $_GET['result'] . '</div>';
    }
    ?>
</body>

</html>