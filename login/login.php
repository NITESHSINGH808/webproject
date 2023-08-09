
<?php

session_start();

include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header('Location: index.php?error=User Name is required');
        exit();
    } else if (empty($password)) {
        header("Location:index.php?error=Password is required");
        exit();
    }

    // Prepare the SQL statement with placeholders
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the parameters to the statement
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result set
        $result = mysqli_stmt_get_result($stmt);

        // Check if exactly one row is returned
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password) {
                echo "Logged In";
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header('Location: home.php');
                exit();
            } else {
                header('Location:index.php?error=Incorrect User Name or Password');
                exit();
            }
        } else {
            header('Location: index.php');
            exit();
        }
    } else {
        // Error in preparing the statement
        header('Location: index.php?error=Database Error');
        exit();
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
