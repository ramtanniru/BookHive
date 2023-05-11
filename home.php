<!DOCTYPE html>
<html>

<head>
	<title>BookHive</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>
	<header>
		<h1><img src="images/logo-2.png" width="300px"></h1>
		<nav>
			<ul>
				<li><a href="?">Home</a></li>
				<li><a href="cart2.php">Cart</a></li>
				<li><a href="?">About us</a></li>
				<li><a href="login.htm">Logout</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section id="banner">
			<h2>Welcome to our Online Bookstore</h2>
			<p>Find your favorite books at great prices!</p>
		</section>
		<section id="categories">
			<h2>Book Categories</h2>
			<ul>
				<li><a href='?'>All</a></li>
				<li><a href="?category=fiction">Fiction</a></li>
				<li><a href="?category=non-fiction">Non-fiction</a></li>
				<li><a href="?category=biography">Biography</a></li>
				<li><a href="?category=children">Children's Books</a></li>
			</ul>
		</section>
		<section id="featured-books">
			<h2>Featured Books</h2>
			<ul>
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

				// Get category from URL parameter
				$category = isset($_GET['category']) ? $_GET['category'] : '';

				// Build SQL query based on category
				$sql = 'SELECT b.BookID, b.Title, b.Price, b.ImageURL, a.Name 
						FROM Books b
						JOIN Authors a ON b.AuthorID = a.AuthorID';
				if ($category) {
					$sql .= " WHERE b.categoryId = (SELECT categoryId FROM Categories WHERE name ='$category');";
				}

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
			</ul>
		</section>
	</main>
</body>

</html>