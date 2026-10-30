<?php

session_start();

include "db.php";

$message = "";


if (isset($_GET["registered"])) {

    $message =
        "Registration successful. Please login.";

}


if (isset($_POST["login"])) {

    $email = trim($_POST["email"]);

    $password = $_POST["password"];


    $stmt = mysqli_prepare(
        $conn,
        "SELECT id, name, email, password
         FROM students
         WHERE email = ?"
    );


    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $email
    );


    mysqli_stmt_execute($stmt);


    $result =
        mysqli_stmt_get_result($stmt);


    if (mysqli_num_rows($result) == 1) {

        $student =
            mysqli_fetch_assoc($result);


        if (
            password_verify(
                $password,
                $student["password"]
            )
        ) {

            $_SESSION["student_id"] =
                $student["id"];

            $_SESSION["student_name"] =
                $student["name"];

            $_SESSION["student_email"] =
                $student["email"];


            header(
                "Location: dashboard.php"
            );

            exit();

        } else {

            $message =
                "Invalid email or password.";

        }

    } else {

        $message =
            "Invalid email or password.";

    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


<header>

    <nav class="navbar">

        <div class="logo">
            🎓 CS Department
        </div>

        <div class="nav-links">

            <a href="index.html">
                Home
            </a>

            <a href="courses.html">
                Courses
            </a>

            <a href="faculty.html">
                Faculty
            </a>

            <a href="about.html">
                About
            </a>

            <a href="contact.html">
                Contact
            </a>

            <a href="login.php"
                class="active">
                Login
            </a>

        </div>

    </nav>

</header>


<section class="form-page">

    <div class="form-container">

        <div class="form-icon">
            🔐
        </div>

        <h1>
            Student Login
        </h1>

        <p class="form-subtitle">
            Login to your student account
        </p>


        <?php if (!empty($message)) { ?>

            <div class="success-message">
                <?php echo $message; ?>
            </div>

        <?php } ?>


        <form method="POST"
            action="login.php">


            <label>
                Email
            </label>

            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                required>


            <label>
                Password
            </label>

            <div class="password-box">

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required>

                <button
                    type="button"
                    onclick="togglePassword()">

                    👁

                </button>

            </div>


            <button
                type="submit"
                name="login"
                class="form-btn">

                Login

            </button>

        </form>


        <p class="form-bottom">

            Don't have an account?

            <a href="register.php">
                Register
            </a>

        </p>

    </div>

</section>


<script src="script.js"></script>

</body>

</html>