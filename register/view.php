<?php
include "config.php";
$sql = "SELECT * FROM users";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="view.css">

</head>
<body>
    <div class="container">
        <h2>User's</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){

                ?>
                        <tr>
                            <td><?php echo $row["id"];?></td>
                            <td><?php echo $row["username"];?></td>
                            <td><?php echo $row["first_name"];?></td>
                            <td><?php echo $row["last_name"];?></td>
                            <td><?php echo $row["email"];?></td>
                            <td><?php echo $row["password"];?></td>
                            <td><?php echo $row["gender"];?></td>
                            <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">
                            Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>">
                            Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>    
                

            </tbody>
        </table>
    </div>
</body>
</html>