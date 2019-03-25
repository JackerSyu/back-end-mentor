<?
  $is_login = FALSE;
  $user_id = '';
  if(isset($_COOKIE["user_id"]) && !empty($_COOKIE["user_id"])){
    $is_login = TRUE;
    $user_id = $_COOKIE["user_id"];
  }
  else
  {

  }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type='text/css'>
		.board__main{
			width: 500px;
			margin:0 auto;
		}
		.board__form-input > input{
			width: 50%;
		}
		.board__form-textarea > textarea{
			width: 100%;
			height: 200px;
			margin-top: 10px;
		}
		.board__form-submit{
			padding: 10px 30px;
			background: #3597dc;
			color: white;
			border-radius: 10px;
		}
		.comment{
			border: 1px solid rgba(0,0,0,0.2);
			padding: 15px;
		}

		.comment ~ .comment{
			margin-top: 10px;
		}
		.comment__header{
			border-bottom: 1px solid rgba(0,0,0,0.2);
			padding-bottom: 10px;
			margin-bottom: 10px;
			display: flex;
			justify-content: space-between;
		}
		.board__comments{
			margin-top: 25px;
		}
		.board__comments .board__form{
			margin-top: 15px;
		}
		.board__subcomments{
			margin-top: 15px;
			margin-left: 20px;
		}
		.board__subcomments .comment{
			border: none;
			background: #d3e2ec;
			
		}
		.board__subcomments .board__form-textarea > textarea{
			width: 80%;
			height: 100px;
		}
	
	</style>
</head>
<body>
	<div class='board__main'>
    <?
      if(!$is_login)
      {
    ?>
      <a href="register.php">注冊</a>
      <a href="login.php">登入</a>
    <?}
      else
      {
    ?>
      <a href="logout.php">登出</a>  
    <?
      }
    ?>

    
    <h1 class='board__title'>留言板</h1>
    <div class='board__form'>
      <form method='POST' action='add_comment.php'>

        <div class='board__form-textarea'>
            <textarea name='content' placeholder="留言內容"></textarea>
        </div>
        <input type='hidden' name='parent_id' value='0'>
        <?
          if($is_login)
          {
            echo "<input class='board__form-submit' type='submit' value='送出'>";
          }
          else
          {
            echo "<input class='board__form-submit' type='submit' value='登入留言' disabled>";
          }
        ?>
        
      </form>
    </div>
		<div class='board__comments'>
<?php

  require_once('conndb.php');
  $sql = "SELECT comments.id, comments.content,comments.created_at ,users.nickname FROM comments left JOIN users on comments.user_id = users.id  WHERE parent_id=0  ORDER BY created_at DESC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        include('template_comment.php');
    }
  }
?>
 
		</div>
	</div>
</body>
</html>