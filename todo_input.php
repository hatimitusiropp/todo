<?php  require_once 'encode.php';

function showOption($start,$end){
      for($i = $start; $i <= $end; $i++){
            print('<option value ="'.$i.'">'.$i.'</option>');
      }
}
?>
<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <title>TODOアプリ</title>
        <link rel="stylesheet" href="todo_style.css">
</head>
<body>
        <div id="header"> </div>

        <h2>TODO追加</h2>
            <form method="POST" action="todo_record.php">
      <div class="container">
          タスク内容:<br/>
                  <input type="text" id="title" name="title" size="50" maxlength="255" />
      </div>

      <div class="container">
              タスク期限:<br/>
              <select id="todo_date_year" name="todo_date_year">
                      <?php showOption(2015,2020,date('Y',$sdate)); ?>
                      <label for="todo_date_year">年</label>
              </select>
              <select id="todo_date_month" name="todo_date_month">
                      <?php showOption(1,12,date('n',$sdate)); ?>
                      <label for="todo_date_month">月</label>
              </select>
              <select id="todo_date_day" name="todo_date_day">
                      <?php showOption(1,31,date('j',$sdate)); ?>
                      <label for="todo_date_day">日</label>
              </select>
      </div>

      <div class="remarks">
        <label for="remarks" >備考:</label><br/>
        <textarea rows = "5" cols = "30" name="memo"  /></textarea>
      </div>

      <div class = "container">
            <label for  = "prime" >優先度</label><br/>
            低<input type = "range"  name = "prime" value = "1" min = "1" max = "5" step = "1">高
      </div>

      <input type="submit"  id = "add" value="＋追加"><br/>
      <a href = "todo_read.php" >TODOリストの確認</a>
      <div id="footer"><div>

            <div id = "bell"></div>

</body>
</html>
