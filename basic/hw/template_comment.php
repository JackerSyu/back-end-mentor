<div class='comment'>
  <div class='comment__header'>
    <div class='comment__author'><? echo $row['nickname'] ?></div>
    <div class='comment__timestamp'><?echo $row['created_at'] ?></div>
  </div>
  <div class='comment__content'>
    <?echo $row['content'] ?>
  </div>
  <div class='board__subcomments'>
<?
  $parent_id= $row['id'];
  $sql_child = "SELECT comments.*,users.nickname FROM comments left JOIN users on comments.user_id = users.id  WHERE parent_id= $parent_id  ORDER BY created_at DESC";
  $result_child = $conn->query($sql_child);

  if ($result_child->num_rows > 0) {
      // output data of each row
      while($sub_comment = $result_child->fetch_assoc()) {
        include('template_subcomment.php');
      }
    }

?>
    <div class='board__form'>
      <form method='POST' action='add_comment.php'>

          <div class='board__form-textarea'>
              <textarea name='content' placeholder="留言內容"></textarea>
          </div>
          <input type='hidden' name ='parent_id' value='<? echo $row['id'] ?>'>
          <?
            if($is_login)
            {
              echo "<input class='board__form-submit' type='submit' value='Reply'>";
            }
            else
            {
              echo "<input class='board__form-submit' type='submit' value='登入回復' disabled>";
            }
          ?>
      </form>
    </div>
  </div>
</div>
<? 