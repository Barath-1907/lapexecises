<?php

session_start();

include "db.php";

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "admin") {

    header("Location: login.php");
    exit();

}

$sql = "SELECT id, name, email, phone, department, designation
        FROM users
        WHERE role = 'employee'
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <div class="logo">
        TechNova Admin
    </div>

    <nav>

        <a href="admin_dashboard.php">
            Employees
        </a>

        <a href="logout.php">
            Logout
        </a>

    </nav>

</header>


<div class="dashboard">

    <div class="dashboard-title">

        <h1>Admin Dashboard</h1>

        <p>
            Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>
        </p>

    </div>


    <h2>All Employee Details</h2>


    <div class="table-wrapper">

        <table>

            <tr>

                <th>ID</th>

                <th>Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Department</th>

                <th>Designation</th>

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
                    <?php echo htmlspecialchars($row["department"]); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row["designation"]); ?>
                </td>

            </tr>

            <?php

                }

            } else {

                echo "<tr>
                        <td colspan='6'>
                            No employee records found.
                        </td>
                      </tr>";
            }

            ?>

        </table>

    </div>

</div>

</body>

</html>