<?php
require_once 'encode.php';
require_once  'database.php';
try{
        $db = new PDO('mysql: host='. $db_host .';dbname='.$db_name.';charset=utf8', $db_user, $db_pass );
        $stt = $db ->prepare('SELECT * FROM todolist ORDER BY prime DESC');
        $stt ->execute();
}catch(PDOException $e){
      die('エラーメッセージ:'.$e->getMessage());
}?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>TODOアプリ</title>
        <link rel="stylesheet" href="todo_style.css">
</head>
<body>

        <h3>TODOリスト!!!!</h3>
              <?php
              while($row = $stt->fetch()):
                    ?>
             <form method="POST" action="todo_delete.php">
                    <div class = "list">
                               <l><?php format($row['todo_date']);?>までに</l><br/>
                               <label for = "task" id = "task">タスク内容:</label>
                               <?php print(e($row['title']));?><br/>
                               <label for = "remarks" id = "remarks">備考:</label>
                               <?php print(nl2br(e($row['memo'])));?><br/>
                              <label for = "prime" id = "prime">優先度:</label>
                              <?php for($i = 1; $i <= $row['prime']; $i ++){
                                    print('<img src = "./picture/dorayaki.png"></img>');
                              }
                        ?><br/>
                              <input type = "button" id = "update" value = "編集"  onclick  =  "location.href  = 'todo_edit.php?todo_id=<?php print(e($row['todo_id']));  ?>' "  />
                              <input type = "hidden"  name = "todo_id"  value = "<?php print(e($row['todo_id'])); ?>" />
                               <input type = "submit"       name = "delete" id = "delete"  value = "タスク取り消し" onclick = "return confirm('本当に取消してもよろしいですか？')" /></br>
                              <input   type  =  "submit" name = "finish"  id = "finish"  value = "完了!!(゜∀゜)/">

               </div>
            </form>
 <?php endwhile; ?>

<div id = "move">
      <a href = "todo_input.php">TODO追加画面へ</a>
</div>

</body>
</html>
