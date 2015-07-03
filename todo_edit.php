<?php
require_once 'encode.php';
require_once 'database.php';

function showOption($start,$end,$current){
      for($i = $start; $i <= $end; $i++){
            print('<option value ="'.$i.'"');
                  if($i === (int)$current){
                        print('selected');
                  }
            print('>'.$i.'</option>');
      }
}

try{
       $db = new PDO('mysql: host='. $db_host .';dbname='.$db_name.';charset=utf8', $db_user, $db_pass );
        $stt = $db ->prepare('SELECT * FROM todolist WHERE todo_id=:todo_id');
        $stt ->bindValue(':todo_id',$_GET['todo_id']);
        $stt ->execute();
}catch(PDOException $e){
  die('エラーメッセージ:'.$e ->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
      <!--<link rel="stylesheet" href="todo_style.css"> -->
        <meta charset="utf-8"/>
        <title>TODOアプリ</title>
</head>
<body>
  <h3>TODOリスト編集</h3>

  <?php
        if($row = $stt ->fetch()){
             $todo_date = strtotime($row['todo_date']);
    ?>
<form method = "POST"  action = 'todo_update.php'/>
      <input type="hidden" name="todo_id" value="<?php print(e($row['todo_id']));  ?>" />

      <div class="container">
              <label for="title">タスク内容</label><br/>
              <input type="text" id="title" name="title"
              size="50" maxlength="255"
              value="<?php print(e($row['title'])); ?>" />
      </div>

      <div class="container">
              タスク期限:<br/>
            <select id="todo_date_year" name="todo_date_year">
                    <?php showOption(2015,2020,date('Y',$todo_date)); ?>
                    <label for="todo_date_year">年</label>
            </select>
            <select id="todo_date_month" name="todo_date_month">
                    <?php showOption(1,12,date('m',$todo_date)); ?>
                    <label for="todo_date_month">月</label>
            </select>
            <select id="todo_date_day" name="todo_date_day">
                    <?php showOption(1,31,date('d',$todo_date)); ?>
                    <label for="todo_date_day">日</label>
            </select>
      </div>

      <div class="container">
                    <label for="memo">備考:</label><br/>
                    <textarea rows = "5" cols = "30" name="memo"  value="<?php print(e($row['memo'])); ?>" /></textarea>

      </div>

      <div class = "container">
                        <label for  = "prime">優先度</label><br/>
                        低<input type = "range"    name = "prime"    min = "1"      max = "5"         step = "1"     value = "<?php print($row['prime']);  ?>" />高
      </div>

      <input type="submit"   id = "update2"  name="update"    value="更新" />
      <input type = "button"         id = "cancel"     value = "キャンセル"  onclick = "location.href = 'todo_read.php'" />
</form>
<?php
   }  else{
         print('該当するデータがありませんでした。');
   }
   ?>
</body>
</html>
