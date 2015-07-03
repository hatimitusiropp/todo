<?php
require_once 'database.php';

try{
       $db = new PDO('mysql: host='. $db_host .';dbname='.$db_name.';charset=utf8', $db_user, $db_pass );
        $stt = $db ->prepare('INSERT INTO todolist(title,todo_date,memo,prime)VALUES(:title, :todo_date, :memo,:prime)');
        $stt ->bindValue(':title', $_POST['title']);
        $stt->bindValue(':todo_date',$_POST['todo_date_year'].'/'.$_POST['todo_date_month'].'/'.$_POST['todo_date_day']);
        $stt ->bindValue(':memo',$_POST['memo']);
        $stt ->bindValue(':prime',$_POST['prime']);
        $stt ->execute();
        $db =NULL;
}catch(PDOException $e){
        die('エラーメッセージ:'.$e ->getMessage());
}
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/todo_input.php');
