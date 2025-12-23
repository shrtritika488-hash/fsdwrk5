<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .student-list {
            margin: 20px 0;
        }
        .student-item {
            background: #f5f5f5;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border-left: 4px solid #007bff;
        }
        .no-students {
            padding: 20px;
            text-align: center;
            color: #666;
            font-style: italic;
        }
        .total-students {
            background-color: #e9f7ef;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #28a745;
            font-weight: bold;
        }
    </style>
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
            <h2>Student List</h2>
            
            <?php
            // Check if student.txt exists and has content
            $filename = 'student.txt';
            
            if (file_exists($filename) && filesize($filename) > 0) {
                // Read all students from file
                $students = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                
                if (!empty($students)) {
                    echo '<div class="total-students">Total Students: ' . count($students) . '</div>';
                    
                    echo '<div class="student-list">';
                    
                    foreach ($students as $index => $student_data) {
                        // Display each student's information
                        echo '<div class="student-item">';
                        echo '<strong>Student #' . ($index + 1) . '</strong><br>';
                        
                        // Parse and display the data nicely
                        $data_parts = explode(', ', $student_data);
                        foreach ($data_parts as $part) {
                            echo htmlspecialchars($part) . '<br>';
                        }
                        
                        echo '</div>';
                    }
                    
                    echo '</div>';
                } else {
                    echo '<div class="no-students">No students added yet.</div>';
                }
            } else {
                echo '<div class="no-students">No students added yet.</div>';
            }
            ?>
            
            <div style="margin-top: 20px;">
                <a href="add_students.php" class="btn" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px;">
                    Add Another Student
                </a>
            </div>
        </div>
    </main>

    <footer>
        <p>© 2025 Student Portfolio Manager</p>
    </footer>
</body>
</html>