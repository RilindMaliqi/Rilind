<?php
require 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (hash_equals($user['password'], $password)) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
    header("Location: home.php");
    exit();
        } else {
            echo "<script>alert('Password i pasaktë!');</script>";
        }
    } else {
        echo "<script>alert('Ky përdorues nuk ekziston!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Kyçu</title>
</head>
<body>
<div class="card">
    <h1>Kyçu</h1>
    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Hyr</button>
    </form>
    <p class="muted">S’ke llogari? <a href="register.php">Regjistrohu</a></p>
</div>
</body>
</html>
