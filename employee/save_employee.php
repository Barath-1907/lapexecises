<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $department = $_POST["department"];


    $sql = "INSERT INTO employees
            (name, email, phone, department)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssss",
        $name,
        $email,
        $phone,
        $department
    );

    if (mysqli_stmt_execute($stmt)) {

        echo "
        <script>
            alert('Employee details saved successfully!');
            window.location.href='index.php';
        </script>
        ";

    } else {

        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>