
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
				<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
				</form>
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
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h3 class="page-header" align="center">Добавление работы</h3>
					<div class="alert alert-info" align="center">Внимание! Заполните все необходимые поля, и проверте их достоверность. </div>	


					<div class="row placeholders ">


						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Шаблон 21.01.2016</h3>
							</div>
							<div class="panel-body">
								<div align="center">
									<form action="" method="GET">
										<div class="well well-lg">
											<p align="center">Кафедра</p> 
											<input type="text" name="chair" class="form-control" placeholder="Кафедра программирования и автоматизации бизнес-процессов">
											<p align="center">Тема</p> 
											<input type="text" name="subject" id="searchbox" class="form-control" placeholder="Разработка системы управления курсовыми и дипломными работами. ">
											<div  align="center"> 

												<p class="leftstr">Код ОКСО</p>
												<p class="rightstr">Cпециальность / Направление </p>
												<input type="text" name="code_okso" class="form-control-smile" placeholder="09.09.03">      
												<input type="text" name="specialty" id="searchbox" class="form-control-smile" placeholder=" «Прикладная информатика в экономике»">
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

												<p align="center">Научный руководитель</p> 
												<p class="leftstr">Ф.И.О</p>
												<p class="rightstr">Ученая степень / ученое звание</p>
												<input type="text" name="name_head"  class="form-control-smile" placeholder="Пирогов Владислав Юрьевич">      
												<input type="text" name="rank_head"  class="form-control-smile" placeholder="канд. физ-мат. наук, доцент">

												<p align="center">Нормаконтроль</p> 
												<p class="leftstr">Ф.И.О</p>
												<p class="rightstr">Ученая степень / ученое звание</p>
												<input type="text" name="name_normative"  class="form-control-smile" placeholder="Иванов Иван Иванович">      
												<input type="text" name="rank_normative"  class="form-control-smile" placeholder="канд. физ-мат. наук, доцент">



												<p align="center">Консультант(ы)</p> 
												<p class="leftstr">Ф.И.О</p>
												<p class="rightstr">Ученая степень / ученое звание</p>
												<div>
													<label class="checkbox-inline">
														<input type="checkbox" id="radio-inline" checked="true" name="status_consultant_1" value="1">№1:
													</label>
													<input type="text" name="name_consultant_1" class="form-control-smile" placeholder="Петров Петр Петрович"> 
													<input type="text" name="rank_consultant_1" class="form-control-smile" placeholder="Кандидат.пед.наук">


												</div>

												<div>
													<label class="checkbox-inline">
														<input type="checkbox" id="radio-inline"  name="status_consultant_2" value="1">№2:
													</label>
													<input type="text" name="name_consultant_2" class="form-control-smile" placeholder="Петров Петр Петровичь"> 
													<input type="text" name="rank_consultant_2" class="form-control-smile" placeholder="Кандидат.пед.наук">


												</div>
												<div>
													<label class="checkbox-inline">
														<input type="checkbox" id="radio-inline"  name="status_consultant_3" value="1">№3:
													</label>
													<input type="text" name="name_consultant_3" class="form-control-smile" placeholder="Петров Петр Петровичь"> 
													<input type="text" name="rank_consultant_3" class="form-control-smile" placeholder="Кандидат.пед.наук">


												</div>
												<div>
													<label class="checkbox-inline">
														<input type="checkbox" id="radio-inline"  name="status_consultant_4" value="1">№4:
													</label>
													<input type="text" name="name_consultant_4" class="form-control-smile" placeholder="Петров Петр Петровичь"> 
													<input type="text" name="rank_consultant_4" class="form-control-smile" placeholder="Кандидат.пед.наук">


												</div>

												<p align="center">Зав.Кафедрой</p> 
												<p class="leftstr">Ф.И.О</p>
												<p class="rightstr">Ученая степень / ученое звание</p>
												<div>
													<input type="text" name="name_head_chair" class="form-control-smile" placeholder="09.09.03"> 
													<input type="text" name="rank_head_chair" class="form-control-smile" placeholder="09.09.03">	
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

$_GET['chair']!='' and 
$_GET['subject']!='' and
$_GET['code_okso']!='' and
$_GET['specialty']!='' and
$_GET['executor']!='' and
$_GET['groups']!='' and
$_GET['sex']!='' and
$_GET['office']!='' and
$_GET['name_head']!='' and
$_GET['rank_head']!='' and
$_GET['name_normative']!='' and
$_GET['rank_normative']!='' and
$_GET['name_consultant_1']!='' and
$_GET['rank_consultant_1']!='' and
/*$_GET['name_consultant_2']!='' and
$_GET['rank_consultant_2']!='' and
$_GET['name_consultant_3']!='' and
$_GET['rank_consultant_3']!='' and
$_GET['name_consultant_4']!='' and
$_GET['rank_consultant_4']!='' and*/
$_GET['name_head_chair']!='' and
$_GET['rank_head_chair']!='' and
$_GET['open']!='' and
$_GET['date_def']
		)
/*$_GET['status_consultant_1']!='' and
$_GET['status_consultant_2']!='' and
$_GET['status_consultant_3']!='' and
$_GET['status_consultant_4']!='')*/
	{
$chair = $_GET['chair'];
$subject = $_GET['subject'];
$code_okso = $_GET['code_okso'];
$specialty = $_GET['specialty'];
$executor = $_GET['executor'];
$groups = $_GET['groups'];
$sex = $_GET['sex'];
$office = $_GET['office'];
$name_head = $_GET['name_head'];
$rank_head = $_GET['rank_head'];
$name_normative = $_GET['name_normative'];
$rank_normative = $_GET['rank_normative'];
$name_head_chair = $_GET['name_head_chair'];
$rank_head_chair = $_GET['rank_head_chair'];
$open = $_GET['open'];
$date_def = $_GET['date_def'];


/*for ($i=4; $i >= 2; $i--) 
{ 
	if($_GET['status_consultant_'.$i.'']!='')
	{
		$col_consultant = $i;
		break;
	}
}*/

$consultant = $_GET['rank_consultant_1'].'<br><strong>'.$_GET['name_consultant_1'].'</strong><br>';
for ($i=2; $i < 4; $i++) 
{ 
	 if(
		 	isset($_GET['status_consultant_'.$i.''])!='' and 
		 	$_GET['name_consultant_'.$i.'']!=''
	 	) 
	 {
		  $consultant .= $_GET['rank_consultant_'.$i.''].'</br>'.$_GET['name_consultant_'.$i.''].'</br>';	
	 } else break;
}












$connect = pg_connect("host=localhost port=5432 dbname=sework user=postgres password=postgres");
		$insert_vkr = pg_query($connect,"INSERT INTO tamplate_vkr (
chair,
subject,
code_okso,
specialty,
executor,
groups,
sex,
office,
name_head,
rank_head,
name_normative,
rank_normative,
name_head_chair,
rank_head_chair,
rank_consultant,
open,
date_def
) VALUES 
(
'$chair',
'$subject',
'$code_okso',
'$specialty',
'$executor',
'$groups',
'$sex',
'$office',
'$name_head',
'$rank_head',
'$name_normative',
'$rank_normative',
'$name_head_chair',
'$rank_head_chair',
'$consultant',
'$open',
'$date_def'

);");


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



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<script src="docs.min.js"></script>
	</body>
	</html>

