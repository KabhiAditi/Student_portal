<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Enrollment</title>
</head>
<body>
    <h2>Enroll a New Student</h2>
    <form method="POST">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Course: <input type="text" name="course" required><br>
        <input type="submit" name="enroll" value="Enroll">
    </form>

    <?php
    if (isset($_POST['enroll'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        $sql = "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')";
        if ($conn->query($sql)) {
            echo "<p>Student Enrolled Successfully!</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    }
    ?>
</body>
</html>
