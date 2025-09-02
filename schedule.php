<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Class Schedule</title>
</head>
<body>
    <h2>Class Schedule</h2>

    <table border="1">
        <tr>
            <th>Course</th>
            <th>Subject</th>
            <th>Day</th>
            <th>Time</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM schedule");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['course']}</td>
                    <td>{$row['subject']}</td>
                    <td>{$row['day']}</td>
                    <td>{$row['time']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
