<?php
session_start();

// Login protection
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

// Database file include
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Member</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="logout-wrapper">
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<div class="center-wrapper">
    <div class="glass-card wide">

        <h2 class="form-title">✨ Add New Member ✨</h2>

        <form class="form enhanced-form" method="POST" action="insert_member.php">

            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter full name" required>
            </div>

            <div class="input-group">
                <label>Age</label>
                <input type="number" name="age" placeholder="Enter age" required>
            </div>

            <div class="input-group">
                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="Enter phone number" required>
            </div>

            <div class="input-group">
                <label>Membership Type</label>
                <select name="membership" required>
                    <option value="">Select Membership</option>
                    <option>Monthly</option>
                    <option>Quarterly</option>
                    <option>Yearly</option>
                </select>
            </div>

            <button class="btn add-btn" type="submit">➕ Add Member</button>

        </form>

        <a class="btn outline" href="index.php">⬅ Back to Home</a>

    </div>
</div>

</body>
</html>
