<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
<header>
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    </header>
    <div class="container">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam laboriosam facere repellat iste quod pariatur sequi nulla dolores ipsa itaque! Blanditiis rerum unde quibusdam dignissimos vitae quaerat nihil praesentium qui.</p>
        <div class="center-link">
            <a href="logout.php">Log out</a>
        </div>
    </div>
</body>
</html>
<?php
}
else{
    header('Location:index.php');
    exit();
}
?>