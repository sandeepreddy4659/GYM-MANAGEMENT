<?php
session_start();

// If already logged in → go to home
if (isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // --- Change your login username/password HERE ---
    $correct_user = "chandu";
    $correct_pass = "12345";
    // ------------------------------------------------

    if ($username === $correct_user && $password === $correct_pass) {
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Gym Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="center-wrapper">
    <div class="glass-card">

        <h1 class="form-title">🔐 Admin Login</h1>

        <?php if ($error != "") echo "<p style='color:red; font-weight:bold;'>$error</p>"; ?>

        <form class="form enhanced-form" method="POST">

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter Username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>

            <button class="btn add-btn" type="submit">Login</button>

        </form>

    </div>
</div>

</body>
</html>
