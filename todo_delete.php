<?php
try{
      $db = new PDO('mysql: host='. $db_host .';dbname='.$db_name.';charset=utf8', $db_user, $db_pass );
      if(isset($_POST['delete'])){
            //var_dump($_POST['todo_id']);
            //print('success');
             $stt =$db ->prepare('DELETE FROM todolist WHERE todo_id=:todo_id');
             $stt ->bindValue(':todo_id', $_POST['todo_id']);
             $stt ->execute();
      }elseif(isset($_POST['finish'])){
            //var_dump($_POST['todo_id']);
            //print('success');
            $stt =$db ->prepare('DELETE FROM todolist WHERE todo_id=:todo_id');
            $stt ->bindValue(':todo_id', $_POST['todo_id']);
            $stt ->execute();
      }

}catch(PDOEXception  $e){
      die('error:'.$e ->getMessage());
}
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/todo_read.php'  );
