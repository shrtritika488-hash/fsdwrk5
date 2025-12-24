<?php
$students = [];

if (file_exists("students.txt")) {
    $lines = file("students.txt", FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        list($name, $email, $skills) = explode(",", $line);
        $students[] = [
            "name" => $name,
            "email" => $email,
            "skills" => str_replace("|", ", ", $skills)
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Student Portfolio Manager</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="add_student.php">Add Student</a>
        <a href="upload_portfolio.php">Upload Portfolio</a>
        <a href="view_students.php">View Students</a>
    </nav>
</header>

<main>
<div class="container">
    <h2>Student List 💗</h2>

    <?php if (empty($students)) { ?>
        <p>No students added yet 💔</p>
    <?php } else { ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Skills</th>
            </tr>

            <?php foreach ($students as $s) { ?>
                <tr>
                    <td><?= htmlspecialchars($s['name']) ?></td>
                    <td><?= htmlspecialchars($s['email']) ?></td>
                    <td><?= htmlspecialchars($s['skills']) ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</div>
</main>

<footer>© 2025 Student Portfolio Manager</footer>

</body>
</html>