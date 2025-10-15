<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT * FROM users WHERE username=?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Ky username ekziston!');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, username, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $username, $password);
        $stmt->execute();
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Regjistrohu</title>
</head>
<body>
<div class="card">
    <h1>Regjistrohu</h1>
    <form method="post">
        <label>Emri</label>
        <input type="text" name="name" required>

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Krijo Llogari</button>
    </form>
    <p class="muted">Ke llogari? <a href="login.php">Kyçu këtu</a></p>
</div>
</body>
</html>
