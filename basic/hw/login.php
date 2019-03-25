
<?php
require('conndb.php');
$error_message = '';

// 要有這個判斷條件
if(!empty($_POST['username']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = $conn->query($sql) ;
    // > 0 表示登入成功
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        setcookie('user_id', $row['id'], time() + (3600 * 24));
        header("Location: index.php");
    }
    else
    {
        $error_message = '賬號密碼錯誤';
    }
    
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
    <h1>登入</h1>
    <?
    if ($error_message !== '')
    {
        echo $error_message;
    }
    ?>
    <form  method='POST' action='login.php'>
    <div>Username : <input type='text' name='username' /></div><br>
    <div>Password : <input type='password' name='password' /></div><br>
    <input type='submit' />
    </form>
</body>
</html>