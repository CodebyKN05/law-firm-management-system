<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'db.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointments</title>
    <link rel="stylesheet" href="css/style2.css"> <!-- Link to style2.css -->
</head>
<body>
    <div class="container">
        <h2>Appointments</h2>
        <table>
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Case Title</th>
                    <th>Client Name</th>
                    <th>Lawyer Name</th>
                    <th>Type</th>
                    <th>Date & Time</th>
                    <th>Location</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT a.*, 
                            c.title AS case_title, 
                            cl.name AS client_name,
                            u.name AS lawyer_name
                        FROM Appointments a
                        LEFT JOIN Cases c ON a.case_id = c.case_id
                        LEFT JOIN Clients cl ON a.client_id = cl.client_id
                        LEFT JOIN Lawyers l ON a.lawyer_id = l.lawyer_id
                        LEFT JOIN Users u ON l.lawyer_id = u.user_id";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['appointment_id']}</td>
                            <td>{$row['case_title']}</td>
                            <td>{$row['client_name']}</td>
                            <td>{$row['lawyer_name']}</td>
                            <td>{$row['appointment_type']}</td>
                            <td>{$row['appointment_datetime']}</td>
                            <td>{$row['location']}</td>
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
