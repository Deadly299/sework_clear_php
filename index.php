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

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" >
      
       
        <form action="index.php" method="GET" >
             
			  <div class="col-lg-6" >
			    <div class="input-group">
			      <input type="text" name ="search" class="form-control" autocomplete="off">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit" >Go!</button>
			      </span>
			    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
			
        </form>
		<div class="search_area">
        <div id="search_advice_wrapper"></div>

    	</div>


		  
		   
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
<?php 
if (isset($_GET['search'])) 
{
	$search = $_GET['search'];
	$connect= pg_connect("host=localhost port=5432 dbname=sework user=postgres password=postgres");
	$db_referal = pg_query($connect, "SELECT  *FROM tamplate_vkr where subject  ilike '%$search%' LIMIT 20 ");


	$row=pg_fetch_row($db_referal);
	
		print'<h4 align="center">Автор: '.$row[5].'</br> Тема: '.$row[2].'</br> Кафедра: '.$row[1].'</br> Дата: '.$row[18].'</h4>

';
   		//print $row[1];
   		
  			
  	
}	

?>
  	

</body></html>