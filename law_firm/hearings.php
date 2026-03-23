<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hearings</title>
    <link rel="stylesheet" href="css/style2.css"> <!-- Linking to style2.css -->
</head>
<body>

<div class="container">
    <h2>Hearings List</h2>
    <table>
        <thead>
            <tr>
                <th>Hearing ID</th>
                <th>Case Title</th>
                <th>Date & Time</th>
                <th>Location</th>
                <th>Status</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT h.*, c.title AS case_title 
                    FROM Hearings h 
                    LEFT JOIN Cases c ON h.case_id = c.case_id";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['hearing_id']}</td>
                        <td>{$row['case_title']}</td>
                        <td>{$row['hearing_date']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['notes']}</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
