<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

  
   <!-- <script data-require="jquery@2.1.1" data-semver="2.1.1" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  -->

<script src="js/jquery-1.12.1.js"></script>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap.js"></script>

<script src="js/modul/search.js"></script> 
    <title>Sework</title>

  </head>

  <body >

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
			<div class="navbar-collapse collapse" >
				<ul class="nav navbar-nav navbar-right">
					<li><a href="modul/authorization.php">Управление</a></li>
					<li><a href="#">Help</a></li>
				</ul>
				
			</div>
		</div>
	</div>


<div class="jumbotron" >
<!-- 
<div class="container" > -->
<div align="center"  >



<div class="tabs">
<h4>Выберите метод поиска</h4>
<ul class="nav nav-tabs">
  <li class="active"><a href="#tab-1" data-toggle="tab" >Простой</a></li>
  <li><a href="#tab-2" data-toggle="tab" >Динамический</a></li> 
  <li><a href="#tab-3" data-toggle="tab" >Расширенный</a></li>
</ul>

<div class="tab-content"><br>
		
	<div class="tab-pane fade in active" id="tab-1">
	<form action="index.php" method="GET" >
		 <p align="center">Выберете место поиска</p><br> 
		<div align="center">
			<label class="checkbox-inline">
				<input type="checkbox" id="checkbox-inline"  name="vkr" value="1"> - Выпускная квалификационная работа 
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="checkbox-inline"  name="kurs" value="1"> - Курсовая работа(проект) 
			</label>
		</div><br>
		 <p align="center">Выберете облать поиска по: </p><br> 
	 <select name="id_dep" class="form-control-1">
		 <option value="0" > Ключевым словам</option>
		 <option value="0" > Дате</option>
		 <option value="0" > Автору работы</option>
		 <option value="0" > Факультету </option>
		 <option value="0" > Кафедре</option>
		 <option value="0" > Названию темы</option>
		 <option value="0" > Группе</option>
		 <option value="0" > Персоналу ШГПУ</option>
	 </select> 
	 <p align="center">Что искать</p><br> 
	 <input type="text" name="search" class="form-control-serch-1" placeholder="Поиск....." autocomplete="off">
 		<button type="submit" class="search_button"><span class="glyphicon glyphicon-search"></span> Найти</button>							</form>
	</div>
	<div class="tab-pane fade " id="tab-2"><!-- 2 -TAB  -->
		<p>Вводите все необходимые слова для поиска.</p>
		<input type="text" name="page" value="1" hidden="true">
	  	<input type="text" name="search" class="form-control-serch" placeholder="Поиск....." autocomplete="off">
 		<button type="submit" class="search_button"><span class="glyphicon glyphicon-search"></span> Найти</button>
 		<div class="search_area" >
<div id="search_advice_wrapper" >
	</div>
	<div class="tab-pane fade " id="tab-3"><!-- 1 -TAB  -->
		<div class="tabs">
			<ul class="nav nav-tabs nav-justified">
			  <li class="active"><a href="#tab-3-1" data-toggle="tab" >Фильтр №1</a></li>
			  <li><a href="#tab-3-2" data-toggle="tab" >Фильтр №2</a></li> 
			  <li><a href="#tab-3-3" data-toggle="tab" >Фильтр №3</a></li>
			</ul>	
		</div><!-- /tabs in 3  -->
		<div class="tab-content">
		  <div class="tab-pane fade " id="tab-3-1">
			<form action="index.php" method="GET" >
				dfds
		  </div>
		  <div class="tab-pane fade " id="tab-3-2">
			
				fds
				
		  </div>
		  <div class="tab-pane fade " id="tab-3-3">
			
				dfs

			</form>
		  </div>
			
	</div><!-- /tab-pane fade  -->
  </div><!-- /tab-content  -->
</div>

</div>



</div>
</div><!-- /search_area  --> 



<div class="search_result" align="center" ></div>

		  

 <!-- </div>/container -->
</div><!-- /jumbotron  -->
     
    
<?php 
if (isset($_GET['search']) AND isset($_GET['page'])) 
{
	if($_GET['search'] != '' AND $_GET['page']!='')
	{
		$col=0;
	$search = $_GET['search'];
	$connect= pg_connect("host=localhost port=5432 dbname=test_c user=postgres password=postgres");
	$db_referal = pg_query($connect, "SELECT  subject FROM vkr_works where subject  ilike '%$search%' ");

	   		//print $row[1];$col=0;
	while ($row2=pg_fetch_row($db_referal))
	{	
		$col++;//$col Это кол-во записей в таблице.
	}
		if($col > 10)
		{
			$google = $col/10;//Это кол-во записей деленная на то, сколько ты хочешь выводить записей я 10 вывожу, 
						  //короче формируешь 1,2,3,4,5.... ну поймешь
				if(isset($_GET['page']))//Когда тыкнул на номер страницы page=номер страницы 
				{	
					$page = $_GET['page']-1;//Тут ты этот номер страныцы умножаешь на 10(так как 10 записей хочешь выводить) 
					$page = $page*10;
					$res=pg_query($connect," SELECT * FROM vkr_works  where subject  ilike '%$search%'
				   ORDER BY id 
				   OFFSET '$page' LIMIT 10;");//Вот тут в запросе ты и подставлеяешь $page(с какой строки начинать)
				
					//print'</br>';
					print '<p class="page-header" align="center">Результатов: примерно <b>'.$col.'</b> </p>';
					while ($row=pg_fetch_row($res))//И выводишь
					{	
						print '<div class="result_div" align="center">';


				print '<a href="modul/open.php?id='.$row[0].'"><h4 class="page-header" align="center">'.$row[2].'</h4></a>	';

				//print' <h3 class="page-header" align="center">Добавление пользователя</h3>';
				print '<p style="font-size: 17px;color:#160909;" align="left"><b>Автор:</b> '.$row[5].'</p>';
				print '<p style="font-size: 17px;color:#160909;" align="left"><b>Кафедра:</b> '.$row[1].'</p>';
				print '<p style="font-size: 17px;color:#160909;" align="left"><b>Группа:</b> '.$row[6].'</p>';
				print '<p style="font-size: 17px;color:#160909;" align="left"><b>Год:</b> '.$row[18].'</p>';


				print '</div>';
				print'</br>';
						
					}

				}
				//Пагинация
				print'<div align="center">';
				print'<ul class="pagination">';
				print'<li><a href="index.php?page= '.($page/10).'&search='.$_GET['search'].'">&laquo;</a></li>';
				for ($i=1; $i < $google; $i++) 
				{ 
						
					 	if ($page/10+1 == $i) 
					 	{
							print'
									  
	<li class="active"><a href="index.php?page= '.$i.'&search='.$_GET['search'].'">'.$i.' <span class="sr-only">(current)</span></a></li>
									';
							//print'<a href="index.php?page= '.$i.'&search='.$_GET['search'].'"  style="color:black;">'.$i.' </a>';//Тут ты список выводишь 1,2,3,4,5,..
					 	}
					 	else
					print '  <li><a href="index.php?page= '.$i.'&search='.$_GET['search'].'">'.$i.'</a></li>';
					 	//print'<a href="index.php?page= '.$i.'&search='.$_GET['search'].'" >'.$i.' </a>';//Тут ты список выводишь 1,2,3,4,5,..
					 	//print 'fds';
					 }
					
				print'<li><a href="index.php?page= '.($page/10+2).'&search='.$_GET['search'].'">&raquo;</a></li>';
				print'</ul>';
				print'</div>';
				//Пагинация
		}else//если меньше 10

	   	{	
			  	$search = $_GET['search'];
				$db_referal = pg_query($connect, "SELECT  *	FROM vkr_works where subject  ilike '%$search%' ");

			   		//print $row[1];$col=0;
				print '<p class="page-header" align="center">Результатов: <b>'.$col.'</b> </p>';
			while ($row2=pg_fetch_row($db_referal))
			{	
				print '<div class="result_div" align="center">';


				print '<a href="modul/open.php?id='.$row2[0].'"><h4 class="page-header" align="center">'.$row2[1].'</h4></a>	';

				//print' <h3 class="page-header" align="center">Добавление пользователя</h3>';
				print '<p style="font-size: 17px;color:#160909;" align="left"><b>Автор:</b> '.$row2[2].'</p>';
				print '<p style="font-size: 17px;color:#160909;" align="left"><b>Группа:</b> '.$row2[5].'</p>';
				print '<p style="font-size: 17px;color:#160909;" align="left"><b>Год:</b> '.$row2[13].'</p>';
				print '<div align="right">
				 
				 <button type="submit" class="save_button"><span class="glyphicon glyphicon-save"></span> Скачать</button>
				</div>

';
				
													

				print '</div>';
				print'</br>';
			}		
	 	} 
	}
}	

?>
  	</div>

</body>
</html>


