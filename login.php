<?php
session_start();

$servername = "localhost";
$username = $_POST['username'];
$password = $_POST['password'];
$conn = new mysqli($servername, "root", "root", "bookhive");
$sql = "SELECT password FROM credenentials WHERE username = '$username';";
$res = $conn->query($sql);
if ($res->num_rows == 1) {
    $row = $res->fetch_assoc();
    $db_password = $row['password'];
    if (strval($db_password) === $password) {
        setcookie("username", $username, time() + (86400 * 30), "/");
        setcookie("loggedin", "true", time() + (86400 * 30), "/");
        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password!')</script>";
    }
} else {
    echo "<script>alert('Invalid username or password!')</script>";
}

?>