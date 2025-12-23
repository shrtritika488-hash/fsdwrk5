<?php
// Start the session for error messages
session_start();

// Process form if submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $course = $_POST["course"];

    if ($name && $email && $course) {
        // Format the data
        $data = "Name: $name, Email: $email, Course: $course\n";
        
        // Append to student.txt file
        file_put_contents('student.txt', $data, FILE_APPEND);
        
        // Set success message
        $_SESSION['success'] = "Student added successfully!";
        
        // Redirect to view students page
        header("Location: view_students.php");
        exit();
    } else {
        $error = "Please fill all fields!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
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
            <h2>Add Student</h2>
            
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            
            <form method="POST">
                <input type="text" name="name" placeholder="Student Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="course" placeholder="Course" required>
                <button type="submit">Add Student</button>
            </form>
        </div>
    </main>

    <footer>
        <p>© 2025 Student Portfolio Manager</p>
    </footer>
</body>
</html>