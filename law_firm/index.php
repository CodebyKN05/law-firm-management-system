<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Law Firm Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="dashboard">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Select a module to manage:</p>

<div class="nav-grid">
    <?php if ($_SESSION['role'] === 'admin'): ?>
        <a href="users.php" class="nav-card"><i class="fas fa-user-cog"></i> Users</a>
        <a href="lawyers.php" class="nav-card"><i class="fas fa-gavel"></i> Lawyers</a>
        <a href="clients.php" class="nav-card"><i class="fas fa-user-friends"></i> Clients</a>
        <a href="cases.php" class="nav-card"><i class="fas fa-briefcase"></i> Cases</a>
        <a href="hearings.php" class="nav-card"><i class="fas fa-balance-scale-left"></i> Hearings</a>
        <a href="documents.php" class="nav-card"><i class="fas fa-file-alt"></i> Documents</a>
        <a href="billings.php" class="nav-card"><i class="fas fa-receipt"></i> Billings</a>
        <a href="appointments.php" class="nav-card"><i class="fas fa-calendar-check"></i> Appointments</a>

    <?php elseif ($_SESSION['role'] === 'lawyer'): ?>
        <a href="clients.php" class="nav-card"><i class="fas fa-user-friends"></i> Clients</a>
        <a href="cases.php" class="nav-card"><i class="fas fa-briefcase"></i> My Cases</a>
        <a href="hearings.php" class="nav-card"><i class="fas fa-balance-scale-left"></i> Hearings</a>
        <a href="documents.php" class="nav-card"><i class="fas fa-file-alt"></i> Documents</a>
        <a href="billings.php" class="nav-card"><i class="fas fa-receipt"></i> Billings</a>
        <a href="appointments.php" class="nav-card"><i class="fas fa-calendar-check"></i> Appointments</a>

    <?php elseif ($_SESSION['role'] === 'secretary'): ?>
        <a href="lawyers.php" class="nav-card"><i class="fas fa-gavel"></i> Lawyers</a>
        <a href="clients.php" class="nav-card"><i class="fas fa-user-friends"></i> Clients</a>
        <a href="cases.php" class="nav-card"><i class="fas fa-briefcase"></i> Cases</a>
        <a href="hearings.php" class="nav-card"><i class="fas fa-balance-scale-left"></i> Hearings</a>
        <a href="appointments.php" class="nav-card"><i class="fas fa-calendar-check"></i> Appointments</a>
    <?php endif; ?>
</div>


        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
