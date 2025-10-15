<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Faqja Kryesore</title>
</head>
<body>
<div class="card">
    <h1>Mirësevjen!</h1>
    <p class="lead">Përshëndetje, <strong><?= htmlspecialchars($_SESSION['name']); ?></strong> 👋</p>

    <a href="logout.php"><button>Shko mbrapsht</button></a>
</div>
</body>
</html>
