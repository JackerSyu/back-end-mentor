<?php

require_once('conndb.php');

$content = $_POST['content'];
$parent_id = $_POST['parent_id'];
$user_id = $_COOKIE['user_id'];
// 如果phpadmin內變亂碼要加這行
mysqli_set_charset($conn, "utf8");
// VALUES 那只有字串要加引號 數字不用（parent id）
$sql = "INSERT INTO comments (user_id, content, parent_id) VALUES ($user_id, '$content', $parent_id)";
if ($conn->multi_query($sql) === TRUE) {
	header('Location: index.php');
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>