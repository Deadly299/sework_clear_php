<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Выбор шаблона</title>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/dashboard.css" rel="stylesheet">
    
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../js/jquery-1.6.4.min.js"></script>
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
          <h3 align="center">Создание шаблонов, для факультетов ШГПИ</h3>

          <div class="row placeholders">

<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<?php 

/*  if (isset($_GET['type'])) $type =$_GET['type'];
  elseif (isset($_POST['type'])) $type = $_POST['type'];
  else
  {
    print'<div class="alert alert-success">Внимание! Шаблон успешно загружен. Что бы создать новый, перейдите по ссылке</div>
          <a href="adminka.php">Вернуться назад.</a>';
    exit;
  }*/
$connect= pg_connect("host=localhost port=5432 dbname=sework user=postgres password=postgres");
$list_fac = pg_query($connect, "SELECT  *FROM faculties");
print '<h2 class="page-header" align="center">Тип шаблона</h2>';
print '<form name="myform" class="form_vkr" action="" method="POST" onsubmit="return save()">';
print '     <label class="checkbox-inline">
              <input type="radio" id="radio-inline"  name="type" checked ="true" value="0"> - Курсовая работа  
            </label>
            <label class="checkbox-inline">
              <input type="radio" id="radio-inline"  name="type" value="1"> - Дипломная работа 
            </label></br></br>
                       ';
print '<h2 class="page-header" align="center">Факультеты</h2>';
    while ($mass_fac=pg_fetch_row($list_fac))
    {     
      print'<label class="checkbox-inline">
                  <input type="radio" id="radio-inline"  name="id_fac" value="'.$mass_fac[0].'"> '.$mass_fac[1].'
            </label>';
    }
 ?>




<div class="content" align="center">
  <textarea name="content" id="frameId" cols="45" rows="5"></textarea>
</div>
  <script type="text/javascript">
    CKEDITOR.replace( 'frameId');
  </script>



  <div class="form_submit">
      <button type="submit" name="Save" class="btn btn-primary">Создать</button>
      <!-- <button type="submit" name="Prewi" class="btn btn-default">Предварительный просмотр</button> -->
  </div>
</form>

      
 

 
<?php 

include("function/function_modul.php");


  if(isset($_POST['content']) and isset($_POST['id_fac']))
  {
     $date_create = date("j.n.Y"); 
     $html = $_POST['content'];
     $id_fac = $_POST['id_fac'];
     $type = $_POST['type'];
     $html= strip_tags($html, '<p><a><colgroup><table><tbody><tr><td><b><strong><br>style="text-align: center; vertical-align: bottom;"');
     $name_sh = 'Шаблон:'.$date_create;
     $col_param = Serch_string_html($_POST['content']);
 
      $connect= pg_connect("host=localhost port=5432 dbname=sework user=postgres password=postgres");
      $res=pg_query($connect,"INSERT INTO setting (name, file_s, id_fac, type) VALUES ('$name_sh','$html','$id_fac', '$type');");
      //header("location:setting_vkr.php");
      
  }

 ?> 
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
         
          
          
          <div class="table-responsive">
           
			
          
        </div>
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../bootstrap.min.js"></script>
    <script src="../docs.min.js"></script>
  </body>
</html>

