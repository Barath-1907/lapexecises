<?php

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);

    $sql = "INSERT INTO contacts
            (name, email, phone, address)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssss",
        $name,
        $email,
        $phone,
        $address
    );

    if (mysqli_stmt_execute($stmt)) {

        header("Location: index.php");
        exit();

    } else {

        $message = "Failed to add contact.";

    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Contact</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-container">

    <h1>Add New Contact</h1>

    <?php if ($message != "") { ?>

        <p class="error">
            <?php echo $message; ?>
        </p>

    <?php } ?>


    <form method="POST" onsubmit="return validateContact()">

        <label>Contact Name</label>

        <input
            type="text"
            id="name"
            name="name"
            placeholder="Enter name"
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


        <label>Address</label>

        <textarea
            id="address"
            name="address"
            placeholder="Enter address"
        ></textarea>


        <button type="submit">
            Save Contact
        </button>

    </form>


    <a href="index.php" class="back-btn">
        ← Back to Contacts
    </a>

</div>


<script src="script.js"></script>

</body>

</html>