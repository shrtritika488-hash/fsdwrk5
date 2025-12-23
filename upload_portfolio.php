<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileName = $_FILES["portfolio"]["name"];
    $tmpName = $_FILES["portfolio"]["tmp_name"];

    move_uploaded_file($tmpName, "uploads/" . $fileName);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>...</header>

<main>
<div class="container">
    <h2>Upload Portfolio 💗</h2>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="portfolio" required>
        <button type="submit">Upload</button>
    </form>

    <?php
    if (!empty($fileName)) {
        echo "<p>Uploaded: <a href='uploads/$fileName' target='_blank'>$fileName</a></p>";
    }
    ?>
</div>
</main>

<footer>© 2025 Student Portfolio Manager</footer>

</body>
</html>