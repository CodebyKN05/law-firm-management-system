<?php
// Include database connection
include 'db.php'; 

// Query to get all billing details
$query = "SELECT * FROM Billings";
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
    <title>Billings</title>
    <link rel="stylesheet" href="css/style2.css"> <!-- Linking to style2.css -->
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Billings</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Case Title</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Billing Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['case_id']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['payment_status']; ?></td>
                        <td><?php echo $row['billing_date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
