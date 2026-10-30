<?php

include "db.php";

$message = "";

if (isset($_POST["register"])) {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $course = trim($_POST["course"]);
    $password = $_POST["password"];

    if (
        empty($name) ||
        empty($email) ||
        empty($phone) ||
        empty($course) ||
        empty($password)
    ) {

        $message = "Please fill all fields.";

    } else {

        $check = mysqli_prepare(
            $conn,
            "SELECT id FROM students WHERE email = ?"
        );

        mysqli_stmt_bind_param(
            $check,
            "s",
            $email
        );

        mysqli_stmt_execute($check);

        mysqli_stmt_store_result($check);


        if (mysqli_stmt_num_rows($check) > 0) {

            $message = "Email already registered.";

        } else {

            $hashedPassword =
                password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );


            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO students
                (name, email, phone, course, password)
                VALUES (?, ?, ?, ?, ?)"
            );


            mysqli_stmt_bind_param(
                $stmt,
                "sssss",
                $name,
                $email,
                $phone,
                $course,
                $hashedPassword
            );


            if (mysqli_stmt_execute($stmt)) {

                header(
                    "Location: login.php?registered=1"
                );

                exit();

            } else {

                $message =
                    "Registration failed.";

            }

        }

    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Registration</title>

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

            <a href="login.php">
                Login
            </a>

        </div>

    </nav>

</header>


<section class="form-page">

    <div class="form-container">

        <div class="form-icon">
            📝
        </div>

        <h1>
            Student Registration
        </h1>

        <p class="form-subtitle">
            Create your student account
        </p>


        <?php if (!empty($message)) { ?>

            <div class="error-message">
                <?php echo $message; ?>
            </div>

        <?php } ?>


        <form
            method="POST"
            action="register.php"
            onsubmit="return validateForm()">


            <label>
                Full Name
            </label>

            <input
                type="text"
                id="name"
                name="name"
                placeholder="Enter your full name"
                required>


            <label>
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Enter your email"
                required>


            <label>
                Phone Number
            </label>

            <input
                type="text"
                id="phone"
                name="phone"
                placeholder="Enter phone number"
                required>


            <label>
                Course
            </label>

            <select
                name="course"
                required>

                <option value="">
                    Select Course
                </option>

                <option value="B.Sc Computer Science">
                    B.Sc Computer Science
                </option>

                <option value="BCA">
                    BCA
                </option>

                <option value="MCA">
                    MCA
                </option>

                <option value="M.Sc Computer Science">
                    M.Sc Computer Science
                </option>

            </select>


            <label>
                Password
            </label>

            <div class="password-box">

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Create password"
                    required>

                <button
                    type="button"
                    onclick="togglePassword()">
                    👁
                </button>

            </div>


            <button
                type="submit"
                name="register"
                class="form-btn">

                Create Account

            </button>

        </form>


        <p class="form-bottom">

            Already have an account?

            <a href="login.php">
                Login
            </a>

        </p>

    </div>

</section>


<script src="script.js"></script>

</body>

</html>