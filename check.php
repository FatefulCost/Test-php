<?php
if($_COOKIE['user']=='nicedude2'){
  $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$levelPass = $_POST['levelPass'];
$weekday = filter_var(trim($_POST['weekday']),FILTER_SANITIZE_STRING);
$fromTime = $_POST['fromTime'];
$tillTime = $_POST['tillTime'];
if ($levelPass == ''){
  $levelPass = 1;
}
if (mb_strlen($login)<3 || mb_strlen($login)>90)
  {
  echo "Недопустимая длина логина";
  exit;
  }
else if (mb_strlen($name)<3 || mb_strlen($name)>50)
  {
  echo "Недопустимая длина имени";
  exit;
  }
  else if (mb_strlen($pass)<2 || mb_strlen($pass)>15)
    {
    echo "Недопустимая длина пароля(от 2 до 15 символов)";
    exit;
    }
$mysql = new mysqli('localhost','mysql','mysql','register-bd');
$mysql->query("INSERT INTO `usersworktime` ( `login`,`weekday`,`fromTime`,`tillTime`) VALUES ('$login', '$weekday','$fromTime','$tillTime')") ;

$mysql->close();
header('location: /' );
}
else{


$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$levelPass = $_POST['levelPass'];
if ($levelPass == ''){
  $levelPass = 1;
}
if (mb_strlen($login)<5 || mb_strlen($login)>90)
  {
  echo "Недопустимая длина логина";
  exit;
  }
else if (mb_strlen($name)<3 || mb_strlen($name)>50)
  {
  echo "Недопустимая длина имени";
  exit;
  }
  else if (mb_strlen($pass)<2 || mb_strlen($pass)>6)
    {
    echo "Недопустимая длина пароля(от 2 до 6 символов)";
    exit;
    }
$mysql = new mysqli('localhost','mysql','mysql','register-bd');
$mysql->query("INSERT INTO `users` ( `login`, `pass`, `name`, `levelPass`) VALUES ('$login', '$pass', '$name', '$levelPass')") ;

$mysql->close();
header('location: /' );
}
 ?>
