<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance</title>
</head>
<body>
    <h2>Mark Attendance</h2>

    <form method="POST">
        Select Student: 
        <select name="student_id" required>
            <?php
            $students = $conn->query("SELECT * FROM students");
            while ($s = $students->fetch_assoc()) {
                echo "<option value='{$s['id']}'>{$s['name']} ({$s['course']})</option>";
            }
            ?>
        </select><br>

        Date: <input type="date" name="date" required><br>
        Status: 
        <select name="status">
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select><br>

        <input type="submit" name="mark" value="Mark Attendance">
    </form>

    <?php
    if (isset($_POST['mark'])) {
        $student_id = $_POST['student_id'];
        $date = $_POST['date'];
        $status = $_POST['status'];

        $sql = "INSERT INTO attendance (student_id, date, status) VALUES ('$student_id', '$date', '$status')";
        if ($conn->query($sql)) {
            echo "<p>Attendance marked successfully!</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    }
    ?>

    <h2>Attendance Records</h2>
    <table border="1">
        <tr>
            <th>Student</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        $result = $conn->query("SELECT a.date, a.status, s.name FROM attendance a JOIN students s ON a.student_id = s.id");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['status']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
