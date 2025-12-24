<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $skills = trim($_POST["skills"]);

    if ($name && $email && $skills) {
        $skillsFormatted = str_replace(",", "|", $skills);
        $data = "$name,$email,$skillsFormatted\n";
        file_put_contents("students.txt", $data, FILE_APPEND);
        header("Location: view_students.php");
        exit;
    } else {
        $error = "Please fill all fields 💔";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

<header>
    <h1>Student Portfolio Manager!</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="add_student.php">Add Student</a>
        <a href="upload_portfolio.php">Upload Portfolio</a>
        <a href="view_students.php">View Students</a>
    </nav>
</header>

<main>
<div class="container">
    <h2>Add Student 💗</h2>

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <input type="text" name="name" placeholder="Student Name">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="skills" placeholder="Skills (comma separated)">
        <button type="submit">Add Student</button>
    </form>
</div>
</main>

<footer>© 2025 Student Portfolio Manager</footer>
</body>
</html>