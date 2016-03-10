<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

   <!--  <link rel="shortcut icon" href="http://bootstrap-3.ru/assets/ico/favicon.ico"> -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<script src="js/jquery-1.6.4.min.js"></script>
	<script src="js/modul/search.js"></script>
    <title>Sework</title>

  <style type="text/css"></style></head>

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
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="modul/authorization.php">Управление</a></li>
					<li><a href="#">Help</a></li>
				</ul>
				
			</div>
		</div>
	</div>


    <div class="jumbotron">
      <div class="container">
       		<div align="center"  >
       		<form action="index.php" method="GET" >
             	<input type="text" name="page" value="1" hidden="true">
			  <input type="text" name="search" class="form-control-serch" placeholder="Поиск....." autocomplete="off">
		  <button type="submit" class="search_button"><span class="glyphicon glyphicon-search"></span> Найти</button>
		<div class="search_area">
        <div id="search_advice_wrapper"></div>
			</div>
        </form>
		
		  
			
		    <div class="search_result" align="center"></div>

		  
		   
<!-- <ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>
 -->

 </div>
</div>
     
    
<?php 
if (isset($_GET['search']) AND isset($_GET['page'])) 
{
	if($_GET['search'] != '' AND $_GET['page']!='')
	{
		$col=0;
	$search = $_GET['search'];
	$connect= pg_connect("host=localhost port=5432 dbname=sework user=postgres password=postgres");
	$db_referal = pg_query($connect, "SELECT  subject 	FROM tamplate_vkr where subject  ilike '%$search%' ");

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
					$res=pg_query($connect," SELECT * FROM tamplate_vkr  where subject  ilike '%$search%'
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
				$db_referal = pg_query($connect, "SELECT  *	FROM tamplate_vkr where subject  ilike '%$search%' ");

			   		//print $row[1];$col=0;
				print '<p class="page-header" align="center">Результатов: <b>'.$col.'</b> </p>';
			while ($row2=pg_fetch_row($db_referal))
			{	
				print '<div class="result_div" align="center">';


				print '<a href="modul/open.php?id='.$row2[0].'"><h4 class="page-header" align="center">'.$row2[2].'</h4></a>	';

				//print' <h3 class="page-header" align="center">Добавление пользователя</h3>';
				print '<p style="font-size: 17px;color:#160909;" align="left"><b>Автор:</b> '.$row2[5].'</p>';
				print '<p style="font-size: 17px;color:#160909;" align="left"><b>Кафедра:</b> '.$row2[1].'</p>';
				print '<p style="font-size: 17px;color:#160909;" align="left"><b>Группа:</b> '.$row2[6].'</p>';
				print '<p style="font-size: 17px;color:#160909;" align="left"><b>Год:</b> '.$row2[18].'</p>';
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


