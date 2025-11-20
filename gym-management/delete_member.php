<?php
include 'db.php';

$id = $_GET['id'];

// Delete the selected member
$conn->query("DELETE FROM members WHERE id = $id");

// Reset ID numbers in order: 1, 2, 3, ...
$conn->query("SET @autoid := 0");
$conn->query("UPDATE members SET id = (@autoid := @autoid + 1)");
$conn->query("ALTER TABLE members AUTO_INCREMENT = 1");

header("Location: view_members.php");
exit();
?>
