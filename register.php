<?php
require "connect.php";
if (!$con) {
    echo "connection error";
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$encrypted_pwd = md5($password);
$sql = "SELECT * FROM user WHERE email = '$email'";


$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo json_encode('Error');
} else {
    $insert = "INSERT INTO user(firstname,lastname,username,password,email)VALUES('$firstname','$lastname','$username','$encrypted_pwd','$email')";
    $query = mysqli_query($con, $insert);
    if ($query) {
        echo json_encode('Succeed');
    }
}
