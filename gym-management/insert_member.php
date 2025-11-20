<?php
include 'db.php';

// simple validation (you can improve later)
$name = trim($_POST['name'] ?? '');
$age = (int)($_POST['age'] ?? 0);
$phone = trim($_POST['phone'] ?? '');
$membership = trim($_POST['membership'] ?? '');

if ($name === '' || $age <= 0 || $phone === '' || $membership === '') {
    echo "All fields are required. <a href='add_member.php'>Go back</a>";
    exit;
}

// use prepared statement to avoid SQL injection
$stmt = $conn->prepare("INSERT INTO members (name, age, phone, membership) VALUES (?, ?, ?, ?)");
$stmt->bind_param("siss", $name, $age, $phone, $membership);

if ($stmt->execute()) {
    header("Location: view_members.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
