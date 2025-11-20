<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gym Membership System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="logout-wrapper">
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<div class="center-wrapper">
    <div class="glass-card">
        <h1>🏋️‍♂️ GYM MEMBERSHIP SYSTEM</h1>

        <a class="btn" href="add_member.php">ADD MEMBER</a>
        <a class="btn outline" href="view_members.php">VIEW MEMBERS</a>
    </div>
</div>

</body>
</html>
