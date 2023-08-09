<?php
include "config.php";

if (isset($_POST['update'])) {
    $user_id = $_POST["id"];
    $username=$_POST["username"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];

    $sql = "UPDATE users SET username='$username',first_name='$first_name', last_name='$last_name', email='$email', password='$password', gender='$gender' WHERE id='$user_id'";

    $result = $conn->query($sql);

    if ($result == true) {
        echo "Record Updated Successfully";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET["id"])) {
    $user_id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id=$user_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $username=$row["username"];
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $email = $row["email"];
            $password = $row["password"];
            $gender = $row["gender"];
            $id = $row["id"];
        }
    } else {
        header('Location: view.php');
    }
}
?>

<html>
<head>
    <h2> User Updated Form</h2>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Personal Information</legend>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="username">User Name :</label>
            <input type="text" name="username" id="username" value="<?php echo $username ;?>" required>
            <label for="first_name">First Name :</label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $first_name ;?>" required>
            <label for="last_name">Last Name :</label>
            <input type="text" name="last_name" id="last_name" value="<?php echo $last_name ;?>" required>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" value="<?php echo $email ;?>" required>
            <label for="password">Password :</label>
            <input type="text" name="password" id="password" value="<?php echo $password ;?>" required>
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" id="genderMale" value="male" <?php if ($gender == "male") {echo "checked";} ?>>Male
            <input type="radio" name="gender" id="genderFemale" value="female" <?php if ($gender == "female") {echo "checked";} ?>>Female
            <input type="submit" value="update" name="update">
        </fieldset>
    </form>
</body>
</html>
