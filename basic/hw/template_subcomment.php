<div class='comment'>
  <div class='comment__header'>
      <div class='comment__author'><? echo htmlspecialchars($sub_comment['nickname'], ENT_QUOTES, 'utf-8') ?></div>
      
      <div class='comment__timestamp'><? echo $sub_comment['created_at'] ?></div>
  </div>
  <div class='comment__content'>
    <? echo htmlspecialchars($sub_comment['content'], ENT_QUOTES, 'utf-8') ?>
  </div>
</div>	