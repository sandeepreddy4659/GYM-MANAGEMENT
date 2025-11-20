<?php
session_start();

// LOGIN PROTECTION
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

// DB CONNECTION
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>View Members</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="logout-wrapper">
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<div class="center-wrapper">
    <div class="glass-card wide">

        <h2 class="glow-title">📋 Members List</h2>

        <div class="table-container">
            <table class="styled-table" aria-live="polite">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Membership</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                // Query members
                $sql = "SELECT * FROM members ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        $id = (int)$row['id'];
                        $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
                        $age = (int)$row['age'];
                        $phone = htmlspecialchars($row['phone'], ENT_QUOTES, 'UTF-8');
                        $membership = htmlspecialchars($row['membership'], ENT_QUOTES, 'UTF-8');

                        echo "<tr>
                                <td>{$id}</td>
                                <td>{$name}</td>
                                <td>{$age}</td>
                                <td>{$phone}</td>
                                <td>{$membership}</td>
                                <td><a class='delete-btn' href='delete_member.php?id={$id}' onclick=\"return confirm('Delete this member?');\">Delete</a></td>
                              </tr>";
                    }

                } else {
                    echo "<tr><td colspan='6' style='text-align:center;color:white;padding:18px;'>No Members Added</td></tr>";
                }

                $conn->close();
                ?>
                </tbody>
            </table>
        </div>

        <a class="btn outline" href="index.php">Back to Home</a>

    </div>
</div>

</body>
</html>
