<?
$login = $_COOKIE['user'];
$mysql = new mysqli('localhost','mysql','mysql','register-bd');
$result = $mysql->query("SELECT * FROM `users` WHERE `login`='$login'");
$user = $result->fetch_assoc();
$resultdoc = $mysql->query("SELECT * FROM `usersworktime`");
$doctor = $resultdoc->fetch_assoc();


$resultTest=$mysql->query("SELECT * FROM `usersworktime`");
  


if($user[levelPass] == 3){
  echo('Привет Борис');  

echo '<div class="col">
           <h1>Регистрация нового врача</h1>
           <form  action="php/check.php" method="post">
             <input type="text" class="form-control" name="login"  id="login" placeholder="Введите ваш логин"><br>

             <input type="text" class="form-control" name="name"  id="name" placeholder="Введите ваше имя"><br>

             <input type="password" class="form-control" name="pass"  id="pass" placeholder="Введите ваш пароль"><br>

             <input type="text" class="form-control" name="levelPass"  id="levelPass" placeholder="Введите уровень доступа"><br>

             <input type="text" class="form-control" name="weekday"  id="weekday" placeholder="Введите дни работы"><br>

             <input type="time" class="form-control" name="fromTime"  id="fromTime" placeholder="Введите со скольки начало работы"><br>

             <input type="time" class="form-control" name="tillTime"  id="tillTime" placeholder="Введите со скольки конец работы"><br>

             <button class="btn btn-success"  type ="submit" >Регистрация</button>
           </form>
         </div> ';
}
else if($user[levelPass] == 2){
  echo('Привет ' . $user[name]);
}
else if($user[levelPass] == 1){
  echo('Привет ' . $user[name]);
  echo('<p>Список врачей: </p>');

while($row = $resultTest->fetch_assoc()){
    
    echo '<p> Имя врача: '.$row['login'].' Время работы: c '.$row['fromTime'].' 
    до '.$row['tillTime'].' Дни работы = '.$row['weekday'].'</p>';
    }

}?>

<select name="user_doc_choice">
<option value="0">Выберите врача для записи</option>
    <? 
$resultdoc = $mysql->query("SELECT * FROM `usersworktime`");
$doctor = $resultdoc->fetch_assoc();
$resultTest=$mysql->query("SELECT * FROM `usersworktime`");
$n=0;
    while($row = $resultTest->fetch_assoc()) 

    { 

    $n++;
    echo '<option value=$n>  '.$row['login']. '</option>';

    }

    ?>    

    </select>
<? 

echo ($_POST['user_doc_choice']);


?>