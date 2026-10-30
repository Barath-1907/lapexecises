<?php

session_start();

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["role"] = $user["role"];

            if ($user["role"] == "admin") {

                header("Location: admin_dashboard.php");
                exit();

            } else {

                header("Location: employee_dashboard.php");
                exit();

            }

        } else {

            $message = "Invalid password.";

        }

    } else {

        $message = "Account not found.";

    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Login - TechNova</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <div class="logo">
        TechNova
    </div>

    <nav>

        <a href="index.php">Home</a>

        <a href="register.php">Register</a>

        <a href="login.php">Login</a>

    </nav>

</header>


<div class="form-container login-box">

    <h2>Login</h2>

    <p class="form-subtitle">
        Login to your company account
    </p>


    <?php if ($message != "") { ?>

        <div class="error">
            <?php echo $message; ?>
        </div>

    <?php } ?>


    <form method="POST">

        <label>Email</label>

        <input
            type="email"
            name="email"
            placeholder="Enter email"
            required
        >


        <label>Password</label>

        <input
            type="password"
            name="password"
            placeholder="Enter password"
            required
        >


        <button type="submit">
            Login
        </button>

    </form>

</div>

</body>

</html>