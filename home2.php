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
        <!-- ... previous code ... -->

        <section id="categories">
            <h2>Book Categories</h2>
            <ul>
                <li><a href="?">All</a></li>
                <li><a href="?category=fiction">Fiction</a></li>
                <li><a href="?category=non-fiction">Non-fiction</a></li>
                <li><a href="?category=biography">Biography</a></li>
                <li><a href="?category=children">Children's Books</a></li>
            </ul>
        </section>
        <section id="featured-books">
            <h2>Featured Books</h2>
            <div class="filters">
                <label for="sort">Sort By:</label>
                <select id="sort" onchange="applyFilters()">
                    <option value="">None</option>
                    <option value="price_asc">Price (Low to High)</option>
                    <option value="price_desc">Price (High to Low)</option>
                    <option value="pages_asc">Pages (Low to High)</option>
                    <option value="pages_desc">Pages (High to Low)</option>
                </select>
                <label for="price">Price:</label>
                <select id="price" onchange="applyFilters()">
                    <option value="">All</option>
                    <option value="lt_15">Less than $15</option>
                    <option value="gt_15">Greater than $15</option>
                </select>
            </div>
            <ul id="book-list">
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
                $sql = 'SELECT BookID, Title, Price, ImageURL,
                        (SELECT Name FROM Authors WHERE Authors.AuthorID = Books.AuthorID) AS Name FROM Books';
                if ($category) {
                    $sql .= " WHERE categoryId = (SELECT categoryId FROM Categories WHERE name ='$category');";
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



        <script>
            function applyFilters() {
                var sortOption = document.getElementById('sort').value;
                var priceOption = document.getElementById('price').value;

                // Redirect to the same page with filtered parameters
                window.location.href = '?sort=' + sortOption + '&price=' + priceOption;
            }

            // Get filter parameters from the URL
            var urlParams = new URLSearchParams(window.location.search);
            var sortParam = urlParams.get('sort');
            var priceParam = urlParams.get('price');

            // Set the filter options to the URL parameters
            document.getElementById('sort').value = sortParam;
            document.getElementById('price').value = priceParam;

            // Apply initial filters if parameters are present
            if (sortParam || priceParam) {
                filterBooks(sortParam, priceParam);
            }

            function filterBooks(sortOption, priceOption) {
                var bookList = document.getElementById('book-list');
                var books = bookList.getElementsByTagName('li');

                var filterQuery = '';

                // Build the SQL filter query
                if (sortOption === 'price_asc') {
                    filterQuery += 'ORDER BY Price ASC';
                } else if (sortOption === 'price_desc') {
                    filterQuery += 'ORDER BY Price DESC';
                } else if (sortOption === 'pages_asc') {
                    filterQuery += 'ORDER BY Pages ASC';
                } else if (sortOption === 'pages_desc') {
                    filterQuery += 'ORDER BY Pages DESC';
                }

                if (priceOption === 'lt_15') {
                    if (filterQuery !== '') {
                        filterQuery += ' WHERE';
                    } else {
                        filterQuery += ' WHERE';
                    }
                    filterQuery += ' Price < 15 ';
                } else if (priceOption === 'gt_15') {
                    if (filterQuery !== '') {
                        filterQuery += ' WHERE';
                    } else {
                        filterQuery += ' WHERE';
                    }
                    filterQuery += ' Price > 15 ';
                }

                // AJAX request to fetch filtered books
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Update the book list with filtered books
                            bookList.innerHTML = xhr.responseText;
                        } else {
                            console.log('Error: ' + xhr.status);
                        }
                    }
                };

                // Send the AJAX request with filter parameters
                xhr.open('GET', 'filter_books.php?filter=' + encodeURIComponent(filterQuery), true);
                xhr.send();
            }
        </script>