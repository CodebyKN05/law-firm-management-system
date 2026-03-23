<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection (use your own connection code)
include 'db.php';

// Fetch lawyers data
$query = "SELECT u.user_id, u.name, u.email, u.role, l.specialization, l.experience_years 
          FROM users u
          JOIN lawyers l ON u.user_id = l.lawyer_id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyers</title>
    <link rel="stylesheet" href="css/style2.css"> <!-- Link to the new style2.css -->
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Lawyers</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Specialization</th>
                    <th>Experience</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo ucfirst($row['role']); ?></td>
                        <td><?php echo $row['specialization']; ?></td>
                        <td><?php echo $row['experience_years']; ?> years</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>

