<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Добавление Работы</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	
	<script type="text/javascript" src="../js/jquery-1.6.4.min.js"></script>
	<link href="../bootstrap/css/dashboard.css" rel="stylesheet">
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
				<a class="navbar-brand" href="#">Sework</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Профиль</a></li>
					<li><a href="#">Настроки</a></li>
					<li><a href="#">Выйти</a></li>
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
		             <ul class="nav nav-sidebar">
		            <li><h4>&nbspДополнительные настройки</h4></li>
		            <li><a href="faculties.php">Факультеты</a></li>
		            <li><a href="departments.php">Кафедры</a></li>
		            <li><a href="code_okso.php">Код ОКСО</a></li>
		            <li><a href="ped_composition.php">Состав ШГПИ</a></li>
		            <li><a href="studens.php">Студенты</a></li>
		          </ul>
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h3 class="page-header" align="center">Добавление работы</h3>
					<div class="alert alert-info" align="center">Внимание! Заполните все необходимые поля, и проверте их достоверность. </div>	


					<div class="row placeholders ">
					<?php if(!isset($_GET['open'])) exit; ?>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Шаблон 21.01.2016</h3>
							</div>
							<div class="panel-body">
								<div align="center">
									<form action="" method="GET">
										<div class="well well-lg">
											<p align="center">Кафедра</p> 
											<select name="id_dep" class="form-control">
											<option value="0" style="background-color:#A88F8F;">Выберете кафедру</option>
<?php 
$connect= pg_connect("host=localhost port=5432 dbname=test_c user=postgres password=postgres");
	$open = $_GET['open'];
	//Шаблон
	$result_tem = pg_query($connect,"SELECT  id, value, id_fac, type FROM templates WHERE id= $open;");
	$row_tem = pg_fetch_row($result_tem);
	//Кафедры
	$result_dep = pg_query($connect,"SELECT  *FROM departments WHERE id_fac='$row_tem[2]'");
    while ($row_dep = pg_fetch_row($result_dep))
    {
      print '<option style ="background-color:#DDCECE;" value="'.$row_dep[0].'">';
        print $row_dep[1];
      print"</option>";
    }


 ?>

</select>

<!-- <select class="form-control">
<option value="0" style="background-color:#A88F8F;">Выберете кафедру</option>
</select> -->
											<!-- <input type="text" name="chair" class="form-control" placeholder="Кафедра программирования и автоматизации бизнес-процессов"> -->
											<p align="center">Тема</p> 
											<input type="text" name="subject" id="searchbox" class="form-control" placeholder="Разработка системы управления курсовыми и дипломными работами. ">
											<div  align="center"> 

												<p class="leftstr">Код ОКСО</p>
												<p class="rightstr">Cпециальность / Направление </p>
												<select name="code_okso" class="form-control">
												<option  value="0" style="background-color:#A88F8F;">Выберете код ОКСО</option>
<?php 
$result_cod = pg_query($connect,"SELECT  *FROM code_okso WHERE id_fac='$row_tem[2]'");
    while ($row_cod = pg_fetch_row($result_cod))
    {
      print '<option name="code_okso" style ="background-color:#DDCECE;" value="'.$row_cod[0].'">';
        print $row_cod[1].': '.$row_cod[2];
      print"</option>";
    }


 ?>		

												</select>
														
												
												<select name="id_qual" class="form-control">
												<option  value="0" style="background-color:#A88F8F;">Выберете код ОКСО</option>
<?php 
$result_cod = pg_query($connect,"SELECT  *FROM qualification ");
    while ($row_cod = pg_fetch_row($result_cod))
    {
      print '<option name="code_okso" style ="background-color:#DDCECE;" value="'.$row_cod[0].'">';
        print $row_cod[1];
      print"</option>";
    }


 ?>		

												</select>

												<p align="center">Ф.И.О Исполнителя</p> 
												<input type="text" name="executor" class="form-control" placeholder="Арченков Павел Владимирович">
												<p align="center">Группа</p> 
												<input type="text" name="groups"  class="form-control-smile" placeholder="484"> <br>    
												<p class="leftstr">Пол</p>
												<p class="rightstr">Отделение </p>
												<div class="leftstr">
													<label class="checkbox-inline">
														<input type="radio" id="radio-inline"  name="sex" value="0"> - М 
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="radio-inline"  name="sex" value="1"> - Ж 
													</label>
												</div>

												<div class="rightstr">
													<label class="checkbox-inline">
														<input type="radio" id="radio-inline"  name="office" value="1"> - Заочное 
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="radio-inline"  name="office" value="0"> - Очное 
													</label>
												</div><br>

												<p align="center">Руководители</p> 
												 <hr>
												<p class="leftstr">Научный руководитель:</p>
												<p class="rightstr">Нормаконтролер:</p>
												<select name="head" class="form-control-smile">
												<option value="0" style="background-color:#A88F8F;">Научный руководитель</option>
<?php 
$result_cod = pg_query($connect,"SELECT  *FROM ped_composition");
    while ($row_cod = pg_fetch_row($result_cod))
    {
      print '<option style ="background-color:#DDCECE;" value="'.$row_cod[0].'">';
        print $row_cod[1];
      print"</option>";
    }


 ?>		
												</select>

							<select name="normative" class="form-control-smile">
												<option value="0" style="background-color:#A88F8F;">Нормаконтролер</option>
<?php 
$result_cod = pg_query($connect,"SELECT  *FROM ped_composition");
    while ($row_cod = pg_fetch_row($result_cod))
    {
      print '<option style ="background-color:#DDCECE;" value="'.$row_cod[0].'">';
        print $row_cod[1];
      print"</option>";
    }


 ?>		
												</select>


												

												<p align="center">Консультант(ы):</p> 
												<p class="leftstr">Ф.И.О</p>
												<p class="rightstr">Ученая степень / ученое звание</p>
<?php 
for ($c=1; $c <= 4 ; $c++) 
{ 
	if($c==1) $check = 'checked'; else $check = '';
print '
<div>
<label class="checkbox-inline">
<input type="checkbox" id="radio-inline" '.$check.' name="status_consultant_'.$c.'" value="'.$c.'">№'.$c.':
</label>
<select name="consultant_'.$c.'" class="form-control-cons">
<option  value="0" style="background-color:#A88F8F;">Консультант №'.$c.'</option>';

$result_cod = pg_query($connect,"SELECT  *FROM ped_composition");
    while ($row_cod = pg_fetch_row($result_cod))
    {
      print '<option style ="background-color:#DDCECE;" value="'.$row_cod[2].' : '.$row_cod[1].'">';
        print $row_cod[2].$row_cod[1];
      print"</option>";
    }
print '</select>
</div>';

print'<input type="text" name="open" value="'.$_GET['open'].'" hidden="true" > ';

}
 ?>
	



												<p align="center">Зав.Кафедрой:</p> 
												<p class="leftstr">Ф.И.О</p>
												<p class="rightstr">Ученая степень / ученое звание</p>
												<div>
													<select name="head_chair" class="form-control-cons">
												<option value="0" style="background-color:#A88F8F;">Зав.Кафедрой</option>
<?php 
$result_cod = pg_query($connect,"SELECT  *FROM ped_composition");
    while ($row_cod = pg_fetch_row($result_cod))
    {
      print '<option style ="background-color:#DDCECE;" value="'.$row_cod[0].'">';
        print $row_cod[1];
      print"</option>";
    }


 ?>		
												</select>
												</div>

												<p class="rightstr">Допущен(a) к защите</p>
												<input type="date" name="date_def" class="form-control-smile"> 

												


											</div>

										</div>
										<div class="form_submit">
											<button type="submit" name="Save" class="btn btn-primary">Сохранить</button>
											<button type="submit" name="Prewi" class="btn btn-default">Предварительный просмотр</button>
										</div>
									</form>
								</div>


							</div>
						</div>
<?php 	
include("security/control.php");
 



if(isset($_GET['Save']))
{							 
	if(

$_GET['id_dep']!='' and 
$_GET['subject']!='' and
$_GET['code_okso']!='' and
$_GET['executor']!='' and
$_GET['groups']!='' and
$_GET['sex']!='' and
$_GET['office']!='' and
$_GET['id_qual']!='' and
$_GET['head']!='' and
$_GET['normative']!='' and
$_GET['consultant_1']!='' and
$_GET['head_chair']!='' and
$_GET['open']!='' and
$_GET['date_def'])

{
	$consultant='';
	
	$subject = $_GET['subject'];
	$executor = $_GET['executor'];
	$id_dep = $_GET['id_dep'];
	$id_code = $_GET['code_okso'];
	$groups = $_GET['groups'];
	$sex = $_GET['sex'];
	$office = $_GET['office'];
	$id_qual = $_GET['id_qual'];
	$id_head = $_GET['head'];
	$id_head_chair = $_GET['head_chair'];
	$id_normal = $_GET['normative'];
	$id_template = $_GET['open'];
	$date_def = $_GET['date_def'];

//print $consultant = $_GET['consultant_1'].'</br>';


for ($i=1; $i <= 4; $i++) 
{ 
	 if(isset($_GET['consultant_'.$i.''])!='' ) 
	 {
	 		if ($_GET['consultant_'.$i.'']!='0')
	 		 {
	 			$consultant .= preg_replace('(:)', '<br><b>',$_GET['consultant_'.$i.'']).'</b><br>';	
	 		 }
	 	  //$html = preg_replace(':', '</br>',$_GET['rank_consultant_'.$i.'']);
		 
	 } else break;
}
//print($consultant);




$connect = pg_connect("host=localhost port=5432 dbname=test_c user=postgres password=postgres");
		$insert_vkr = pg_query($connect,"INSERT INTO vkr_works 
(subject,executor,id_dep,id_code,groups,sex,office,id_qual,id_head,
id_head_chair,id_normal,id_template,consultant,date_def) 
VALUES 
('$subject','$executor','$id_dep','$id_code','$groups','$sex','$office','$id_qual',
'$id_head','$id_head_chair','$id_normal','$id_template','$consultant','$date_def');");
  
  header( "location:load_work.php?open=$id_template"); 
  exit;  

	}
}

//$bodytag = str_replace("%body%", "black", "<body text='%body%'>");



 ?>



					</div>
				</div>
				<h2 class="sub-header">Section title</h2>
				<div class="table-responsive">


				</div>
			</div>
		</div>
	</div>



		
		<script src="bootstrap.min.js"></script>
		<script src="docs.min.js"></script>
	</body>
	</html>

