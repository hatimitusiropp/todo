<?php
require_once 'database.php';

try{
  $db = new PDO('mysql: host='. $db_host .';dbname='.$db_name.';charset=utf8', $db_user, $db_pass );
        if(isset($_POST['update'])){
              $stt = $db ->prepare('UPDATE todolist SET title=:title, todo_date=:todo_date, memo=:memo, prime=:prime  WHERE todo_id=:todo_id');
              $stt ->bindValue(':title', $_POST['title']);
              $stt ->bindValue(':todo_date', $_POST['todo_date_year'].'/'.$_POST['todo_date_month'].'/'.$_POST['todo_date_day']);
              $stt ->bindValue(':memo', $_POST['memo']);
              $stt ->bindValue(':prime', $_POST['prime']);
                $stt ->bindValue(':todo_id', $_POST['todo_id']);
       }
              $stt ->execute();
}catch(PDOException $e){
       die('エラーメッセージ:'.$e ->getMessage());
 }
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/todo_read.php'  );
