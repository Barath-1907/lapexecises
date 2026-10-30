<?php

include "db.php";

$sql = "SELECT * FROM contacts ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Management</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <div class="logo">
        ContactHub
    </div>

    <a href="add_contact.php" class="add-btn">
        + Add Contact
    </a>

</header>


<div class="container">

    <div class="heading">

        <h1>Contact Management</h1>

        <p>Manage your contacts easily</p>

    </div>


    <div class="table-container">

        <table>

            <tr>

                <th>ID</th>

                <th>Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Address</th>

                <th>Actions</th>

            </tr>


            <?php

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <tr>

                <td>
                    <?php echo $row["id"]; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["name"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["email"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["phone"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["address"]); ?>
                </td>

                <td>

                    <a
                        href="edit_contact.php?id=<?php echo $row['id']; ?>"
                        class="edit-btn"
                    >
                        Edit
                    </a>

                    <a
                        href="delete_contact.php?id=<?php echo $row['id']; ?>"
                        class="delete-btn"
                        onclick="return confirmDelete()"
                    >
                        Delete
                    </a>

                </td>

            </tr>

            <?php

                }

            } else {

            ?>

            <tr>

                <td colspan="6">
                    No contacts found.
                </td>

            </tr>

            <?php

            }

            ?>

        </table>

    </div>

</div>


<script src="script.js"></script>

</body>

</html>

<?php

mysqli_close($conn);

?>