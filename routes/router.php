<?php
$uri=explode("/",$_SERVER['REQUEST_URI']);


if(count($uri) > 2){



}else{
  if(!empty($_GET)){
    // $_GET=$string;
    $string=explode("?",$uri[1])[1];
  }else{
    $string="";
  }

switch ($uri[1]) {
  case '':
  include APP_PATH."/view/login.php";
  break;

  case 'login':
  include APP_PATH."/view/login.php";
  break;

  case 'login?'.$string:
  include APP_PATH."/view/login.php";
  break;

  case 'signup':
  include APP_PATH."/view/signup.php";
  break;

  case 'signup?'.$string:
  include APP_PATH."/view/signup.php";
  break;

  case 'dashboard':
  include APP_PATH."/view/dashboard.php";
  break;

  case 'dashboard?'.$string:
  include APP_PATH."/view/dashboard.php";
  break;

  case 'user?'.$string:
  include APP_PATH."/view/user.php";
  break;

  case 'user':
  include APP_PATH."/view/user.php";
  break;

  case 'getmessage?'.$string:
  include APP_PATH."/view/getmessage.php";
  break;


  case 'message?'.$string:
  include APP_PATH."/view/message.php";
  break;

    case 'message':
    include APP_PATH."/view/message.php";
    break;

  default:
  include APP_PATH."/view/login.php";
  break;
}
}

 ?>
