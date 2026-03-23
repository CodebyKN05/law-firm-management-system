<?php
// Include database connection
include 'db.php'; 

// Query to get all case details
$query = "SELECT * FROM Cases";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cases</title>
    <link rel="stylesheet" href="css/style2.css"> <!-- Linking to style2.css -->
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Cases</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Assigned Lawyer</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['start_date']; ?></td>
                        <td><?php echo $row['end_date']; ?></td>
                        <td><?php 
                            // Fetch the lawyer's name based on the lawyer_id
                            $lawyer_query = "SELECT name FROM Users WHERE user_id = " . $row['lawyer_id'];
                            $lawyer_result = mysqli_query($conn, $lawyer_query);
                            $lawyer = mysqli_fetch_assoc($lawyer_result);
                            echo $lawyer['name'];
                        ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
