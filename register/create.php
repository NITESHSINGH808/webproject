<?php
include "config.php";

if (isset($_POST["submit"])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $username=$_POST['username'];

    $sql = "INSERT INTO users (username,first_name,last_name,email,password,gender) VALUES('$username','$first_name','$last_name','$email','$password','$gender')";

    $result = $conn->query($sql);

    if ($result == true) {
        echo "New Record Inserted Successfully";

    } else {
        echo "Error" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <h1>SignUp Form</h1>

    <form action="" method="post">
        <fieldset>
            <legend>Personal Information</legend><br>
            <label for="username">User Name :</label><br>
            <input type="text" name="username" id="username" required><br>
            <label for="first_name">First Name :</label><br>
            <input type="text" name="first_name" id="first_name" required><br>
            <label for="last_name">Last Name :</label><br>
            <input type="text" name="last_name" id="last_name" required><br>
            <label for="email">Email :</label><br>
            <input type="text" name="email" id="email" required><br>
            <label for="password">Password :</label><br>
            <input type="text" name="password" id="password" required><br>
            <p>Gender:
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female<br><br>
            </p>
            <input type="submit" name="submit" value="submit">
        </fieldset>


    </form>
</body>

</html>