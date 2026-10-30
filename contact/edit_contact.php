<?php

include "db.php";

if (!isset($_GET["id"])) {

    header("Location: index.php");
    exit();

}

$id = $_GET["id"];

$sql = "SELECT * FROM contacts WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {

    die("Contact not found.");

}

$contact = mysqli_fetch_assoc($result);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);

    $update = "UPDATE contacts
               SET name = ?,
                   email = ?,
                   phone = ?,
                   address = ?
               WHERE id = ?";

    $update_stmt = mysqli_prepare($conn, $update);

    mysqli_stmt_bind_param(
        $update_stmt,
        "ssssi",
        $name,
        $email,
        $phone,
        $address,
        $id
    );

    if (mysqli_stmt_execute($update_stmt)) {

        header("Location: index.php");
        exit();

    }

    mysqli_stmt_close($update_stmt);
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Contact</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-container">

    <h1>Edit Contact</h1>


    <form method="POST" onsubmit="return validateContact()">

        <label>Contact Name</label>

        <input
            type="text"
            id="name"
            name="name"
            value="<?php echo htmlspecialchars($contact['name']); ?>"
        >


        <label>Email</label>

        <input
            type="email"
            id="email"
            name="email"
            value="<?php echo htmlspecialchars($contact['email']); ?>"
        >


        <label>Phone</label>

        <input
            type="text"
            id="phone"
            name="phone"
            value="<?php echo htmlspecialchars($contact['phone']); ?>"
        >


        <label>Address</label>

        <textarea
            id="address"
            name="address"
        ><?php echo htmlspecialchars($contact['address']); ?></textarea>


        <button type="submit">
            Update Contact
        </button>

    </form>


    <a href="index.php" class="back-btn">
        ← Back to Contacts
    </a>

</div>


<script src="script.js"></script>

</body>

</html>