
<?php
require('conndb.php');

// 要有這個判斷條件
if(!empty($_POST['username']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nickname = $_POST['nickname'];
    $sql = "INSERT INTO users (username, password, nickname) VALUES ('$username','$password', '$nickname');";
    $result = $conn->query($sql);
    
    if($result)
    {
        $last_id = $conn->insert_id;
        setcookie('user_id', $last_id, time() + (3600 * 24));
    }
    
    header("Location: index.php");
}
$conn->close();

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <h1>注冊</h1>
    <form  method='POST' action='register.php'>
    <div>Username : <input type='text' name='username' /></div><br>
    <div>Password : <input type='password' name='password' /></div><br>
    <div>Nickname : <input type='text' name='nickname' /></div><br>
    <input type='submit' />
    </form>
</body>
</html>