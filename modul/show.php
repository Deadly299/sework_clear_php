
<?php
	$connect= pg_connect("host=localhost port=5432 dbname=test_c user=postgres password=postgres");
	
	if(isset($_POST['id']) and isset($_POST['type']))
	{
 
		if($_POST['id']=='')
		{

		}
		else
		{
			$id =$_POST['id'];	
			$type =$_POST['type'];

			switch ($type) 
			{

				case 'true':
					$type = 1;
					break;
				
				case 'false':
					$type = 0;
					break;
			}
			$result2 = pg_query($connect, "SELECT  *FROM templates WHERE id_fac='$id' AND Type = '$type' ");

			print'<h3>Шаблон курсовых работ</h3>';	
		
			while ($row2=pg_fetch_row($result2))
			{
				print''.$row2[1].'
				 <a href="load_work.php?open='.$row2[0].'" target="_blank">Выбрать</a>	
				 <a href="open.php?show='.$row2[0].'" target="_blank">Просмотреть</a><Br>';
				  
   			}
   			print'<Br>Eсли существующие шаблоны не удолетворяют вашим требованиям, создайте новый.<a href="create_template.php" target="_blank">Создать</a>';
 
		}


	}

	

		
	
?>

