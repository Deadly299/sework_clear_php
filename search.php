<?php

$connect= pg_connect("host=localhost port=5432 dbname=sework user=postgres password=postgres");//делаем запрос на товары этой категории

$referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));
 //mb_strtolower($referal);
//$a= mysql_real_escape_string($referal)
//print $a;
//$d1 = strtotime($referal); // переводит из строки в дату
//print $date2 = date("Y-m-d", $d1);
//$referal ='Информатика';
//$db_referal = pg_query($connect, "SELECT  *FROM kafedra WHERE (name_k LIKE '%$referal%' OR id_fac LIKE '%$referal%')");

//$db_referal = pg_query($connect, "SELECT  *FROM kafedra where name_k  Like '%$referal%' or date_create Like '%$referal%' ");

$db_referal = pg_query($connect, "SELECT  *FROM tamplate_vkr where subject  ilike '%$referal%' LIMIT 5 ");

		

	   
	
	   print'<h3>Результат поиска</h3>';
	while ($row=pg_fetch_row($db_referal))
	{
	
			print'
<div class="panel panel-default">
	<div class="panel-heading">
   		 <h3 class="panel-title"><a href="modul/open.php?id='.$row[0].'">'.$row[2].'</a></h3>
  	</div>
  	<div class="panel-body">
   		Кафедра: '.$row[1].' Автор: '.$row[5].' 
  	</div>
</div>';

}

		 

	
	



	
	
	
	

