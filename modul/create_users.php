
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <title>Добавление пользователей</title>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

  <script type="text/javascript" src="../js/jquery-1.6.4.min.js"></script>
  <link href="../bootstrap/css/dashboard.css" rel="stylesheet">
</head>

<body>
<?php include("security/control.php");?>

  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Sework</a>
      </div>
      <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">

          <li><a href="#">Профиль</a></li>
          <li><a href="#">Настроки</a></li>
          <li><a href="authorization.php"><?php  
  print '<b style="color:#6D5FE7;">'.$_SESSION['user'].'</b>&nbsp' ; ?>Выйти
          </a></li>
          <li><a href="#">Help</a></li>
        </ul>
        
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
       <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><h4>&nbspУправление работами</h4></li>
            <li class="active"><a href="adminka.php">Добавить работу</a></li>
            <li><a href="archive_works.php">Архив работ</a></li>
            
          </ul>
          <ul class="nav nav-sidebar">
            <li><h4>&nbspУправление шаблонами</h4></li>
            <li><a href="create_template.php">Создать</a></li>
            <li><a href="edit_template.php">Настроить шаблон работы</a></li>
        
          </ul>
          <ul class="nav nav-sidebar">
            <li><h4>&nbspУправление пользователями</h4></li>
            <li><a href="create_users.php">Добавить пользователя</a></li>
            <li><a href="list_users.php">Список пользователей</a></li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header" align="center">Добавление пользователя</h3>
<?php

 if(  isset($_GET['login']) and
      isset($_GET['lastName']) and
      isset($_GET['firstName']) and
      isset($_GET['fatherName']) and
      isset($_GET['date']) and
      isset($_GET['email']) and
      isset($_GET['inputPassword']) and
      isset($_GET['confirmPassword']) and
      isset($_GET['phoneNumber']) 
    )
{

if( $_GET['login'] !='' and
    $_GET['lastName'] !='' and
    $_GET['firstName'] !='' and
    $_GET['fatherName'] !='' and
    $_GET['date'] !='' and
    $_GET['email'] !='' and
    $_GET['inputPassword'] !='' and
    $_GET['confirmPassword'] !='' and
    $_GET['phoneNumber'] !='' and
    $_GET['inputPassword'] == $_GET['confirmPassword']
   )
    {

     $login = $_GET['login']; 
     $lastName = $_GET['lastName'];
     $firstName = $_GET['firstName'];
     $fatherName = $_GET['fatherName'];
     $date = $_GET['date'];
     $email = $_GET['email'];
     $inputPassword = $_GET['inputPassword'];
     $phoneNumber = $_GET['phoneNumber'];
     $full_name = $_GET['firstName'].' '.$_GET['lastName'].' '.$_GET['fatherName'];

      $connect= pg_connect("host=localhost port=5432 dbname=sework user=postgres password=postgres");
      $res=pg_query($connect,"INSERT INTO users (login, password, role, name, date, email, phone) 
        VALUES ('$login','$inputPassword','444', '$full_name', '$date','$email','$phoneNumber');");
       
            print '<h3 align="center"> <b>Пользователь '.$full_name.'</b></h3>';
            print '<h3 align="center"> Успешно создан!.</h3>';
        
            header( "Refresh:4; url=adminka.php", true, 303);
            exit;
    }
   print '<h3 align="center"> <b>Введены не корректные данные</b></h3>';
            print '<h3 align="center"> Будте внимательны!</h3>';
    header( "Refresh:4; url=create_users.php", true, 303);
    exit;
}



  ?>
          <div class="alert alert-info" align="center">Внимание! Заполните все необходимые поля, и проверте их достоверность. </div>  


          <div class="row placeholders ">


          

<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->

<form class="form-horizontal" >
<div class="form-group">
    <label class="control-label col-xs-3" for="lastName">Логин:</label>
    <div class="col-xs-9">
      <input type="text" name="login" class="form-control" id="login" placeholder="Введите логин">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="lastName">Фамилия:</label>
    <div class="col-xs-9">
      <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Введите фамилию">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="firstName">Имя:</label>
    <div class="col-xs-9">
      <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Введите имя">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="fatherName">Отчество:</label>
    <div class="col-xs-9">
      <input type="text" name="fatherName" class="form-control" id="fatherName" placeholder="Введите отчество">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3">Дата рождения:</label>
    <div class="col-xs-9">
    <input type="date" name="date" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="inputEmail">Email:</label>
    <div class="col-xs-9">
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
    <div class="col-xs-9">
      <input type="password" name="inputPassword" class="form-control" id="inputPassword" placeholder="Введите пароль">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="confirmPassword">Подтвердите пароль:</label>
    <div class="col-xs-9">
      <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Введите пароль ещё раз">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="phoneNumber">Телефон:</label>
    <div class="col-xs-9">
      <input type="tel" name="phoneNumber"class="form-control" id="phoneNumber" placeholder="Введите номер телефона">
    </div>
  </div>
  

  <br />
  <div class="form-group" align="left">
    <div class="col-xs-offset-3 col-xs-9">
      <input type="submit" class="btn btn-primary" value="Регистрация">
      <input type="reset" class="btn btn-default" value="Очистить форму">
    </div>
  </div>
</form>
          
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->    
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <script src="../docs.min.js"></script>
  </body>
</html>
