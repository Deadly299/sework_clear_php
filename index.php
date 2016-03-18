
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Выбор шаблона</title>
 
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../bootstrap/css/dashboard.css" rel="stylesheet">
<!--  <script src="js/jquery-1.12.1.js"></script>  -->
<!-- <script src="//code.jquery.com/jquery-1.12.0.min.js"></script> -->
 <script src="js/jquery-1.6.4.min.js"></script> 
<!-- <script src="bootstrap/js/bootstrap.js"></script> -->
<script src="js/modul/search.js"></script> 

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">Sework</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Профиль</a></li>
            <li><a href="#">Настроки</a></li>
            <li><a href="adminka.php?exit=1">Выйти</a></li>
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
            <li><a href="archive_vkr_works.php">Архив дипломных работ</a></li>
            <li><a href="archive_kurs_works.php">Архив курсовых работ</a></li>
            
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
             <ul class="nav nav-sidebar">
            <li><h4>&nbspДополнительные настройки</h4></li>
            <li><a href="faculties.php">Факультеты</a></li>
            <li><a href="departments.php">Кафедры</a></li>
            <li><a href="code_okso.php">Код ОКСО</a></li>
            <li><a href="ped_composition.php">Состав ШГПИ</a></li>
            <li><a href="studens.php">Студенты</a></li>
          </ul>
        </div>


    <div class="jumbotron" >
      <div class="container" >
       		<div align="center"  >
       		<form action="index.php" method="GET" >
             	<input type="text" name="page" value="1" hidden="true">
			  <input type="text" name="search" class="form-control-serch" placeholder="Поиск....." autocomplete="off">
		  <button type="submit" class="search_button"><span class="glyphicon glyphicon-search"></span> Найти</button>
		<div class="search_area" >
        <div id="search_advice_wrapper" ></div>
			</div>
        </form>
		
		  
			
		    <div class="search_result" align="center" ></div>


 </div>
</div>
     
    

  	</div>

</body>
</html>


