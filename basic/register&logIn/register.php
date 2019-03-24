<?php

require('conndb.php');

$username = $_POST['username'];
$password = $_POST['password'];



$sql = "INSERT INTO users (username, password) VALUES ('".$username."', '".$password."');";

if ($conn->multi_query($sql) === TRUE) {
    echo '<h1>你好！'.$username.' 你已經注冊成功</h1>';
    echo '<a href="user.php">回上一頁</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>