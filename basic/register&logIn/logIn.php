<?php

require('conndb.php');

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE username='".$username."' and password='".$password."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  echo '<h1>你好！'.$username.' 你已經登入成功</h1>';
  echo '<a href="user.php">回上一頁</a>';
} else {
  header('Location: user.php');
}
$conn->close();
?>
