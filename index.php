<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Portfolio Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Student Portfolio Manager</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="add_students.php">Add Student</a>
            <a href="upload_portfolio.php">Upload Portfolio</a>
            <a href="view_students.php">View Students</a>
        </nav>
    </header>

    <main>
        <div class="container">
            <h2>Welcome to Student Portfolio Manager</h2>
            <p>Select an option below:</p>
            
            <div class="options">
                <a href="add_students.php" class="btn">Add Student Info</a>
                <a href="upload_portfolio.php" class="btn">Upload Portfolio File</a>
                <a href="view_students.php" class="btn">View Students</a>
            </div>
        </div>
    </main>

    <footer>
        <p>© 2025 Student Portfolio Manager</p>
    </footer>
</body>
</html>