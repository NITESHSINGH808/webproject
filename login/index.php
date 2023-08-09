<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="index.css"/>
</head>
<body>
    <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php
        if(isset($_GET['error'])){ ?>
        <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>
        <label for="username">User Name</label>
        <input type="text" name="username" id=" username" placeholder="User Name"><br>
        <label for="password">Password</label>
        <input type="text" name="password" id="password" placeholder="Password"><br>
        <button type="submit">Login</button>

    </form>
    <div id="register">
    <a  href="../register/create.php">Didn't have an Account ? Register Here</a>
    </div>
</body>
</html>