<?php
$servername="localhost";
$username="root";
$password="root";
$dbname="mydb";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    echo"connection  failed";
}
?>