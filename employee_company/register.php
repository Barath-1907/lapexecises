<?php

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $department = trim($_POST["department"]);
    $designation = trim($_POST["designation"]);
    $password = $_POST["password"];
    $role = $_POST["role"];

    $check = "SELECT id FROM users WHERE email = ?";

    $stmt = mysqli_prepare($conn, $check);

    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {

        $message = "Email already registered.";

    } else {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users
                (name, email, phone, department, designation, password, role)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $insert = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $insert,
            "sssssss",
            $name,
            $email,
            $phone,
            $department,
            $designation,
            $hashed_password,
            $role
        );

        if (mysqli_stmt_execute($insert)) {

            $message = "Registration successful! You can login now.";

        } else {

            $message = "Registration failed.";

        }

        mysqli_stmt_close($insert);
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Registration - TechNova</title>

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


<div class="form-container">

    <h2>Create Account</h2>

    <p class="form-subtitle">
        Register as an Admin or Employee
    </p>

    <?php if ($message != "") { ?>

        <div class="message">
            <?php echo $message; ?>
        </div>

    <?php } ?>


    <form method="POST" onsubmit="return validateRegistration()">

        <label>Full Name</label>

        <input
            type="text"
            id="name"
            name="name"
            placeholder="Enter your name"
        >


        <label>Email</label>

        <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter email"
        >


        <label>Phone</label>

        <input
            type="text"
            id="phone"
            name="phone"
            placeholder="Enter phone number"
        >


        <label>Department</label>

        <input
            type="text"
            id="department"
            name="department"
            placeholder="Example: Computer Science"
        >


        <label>Designation</label>

        <input
            type="text"
            id="designation"
            name="designation"
            placeholder="Example: Software Developer"
        >


        <label>Password</label>

        <input
            type="password"
            id="password"
            name="password"
            placeholder="Create password"
        >


        <label>Account Type</label>

        <select id="role" name="role">

            <option value="">Select Account Type</option>

            <option value="employee">
                Employee
            </option>

            <option value="admin">
                Admin
            </option>

        </select>


        <button type="submit">
            Register
        </button>

    </form>

</div>


<script src="script.js"></script>

</body>

</html>