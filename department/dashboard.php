<?php

session_start();


if (!isset($_SESSION["student_id"])) {

    header("Location: login.php");

    exit();

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

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

            <a href="logout.php">
                Logout
            </a>

        </div>

    </nav>

</header>


<section class="dashboard-page">

    <div class="dashboard-container">

        <div class="dashboard-icon">
            👋
        </div>

        <h1>
            Welcome,
            <?php
            echo htmlspecialchars(
                $_SESSION["student_name"]
            );
            ?>
        </h1>

        <p>
            Welcome to your student dashboard.
        </p>


        <div class="dashboard-cards">

            <a href="courses.html"
                class="dashboard-card">

                📚

                <h3>
                    Courses
                </h3>

                <p>
                    View available courses
                </p>

            </a>


            <a href="faculty.html"
                class="dashboard-card">

                👨‍🏫

                <h3>
                    Faculty
                </h3>

                <p>
                    Meet our faculty
                </p>

            </a>


            <a href="about.html"
                class="dashboard-card">

                ℹ️

                <h3>
                    About
                </h3>

                <p>
                    About our department
                </p>

            </a>


            <a href="contact.html"
                class="dashboard-card">

                📞

                <h3>
                    Contact
                </h3>

                <p>
                    Contact department
                </p>

            </a>

        </div>


        <a href="logout.php"
            class="logout-button">

            🚪 Logout

        </a>

    </div>

</section>


<footer>

    <div class="copyright">

        © 2026 Computer Science Department

    </div>

</footer>


</body>

</html>