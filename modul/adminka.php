<?php 
include("../layaut/header.php");
include("function/db_connection.php");
include("security/control.php");
  
 ?>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header" align="center">Администрирование</h1>

          <div class="row placeholders">

<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<h4 class="page-header" align="center">Выберете тип работы и факультет</h4>
<div class="rightstr">
                          <label class="checkbox-inline">
                            <input type="radio" id="radio-inline"  name="office" checked="true"> - Дипломная работа 
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" id="radio-inline"  name="office" > - Курсовая работа 
                          </label>
                        </div><br>
<select id="id_fac">
	<option value=""></option>
<?php

$connect= pg_connect("host=localhost port=5432 dbname=sework_new user=postgres password=postgres");

   $result2 = pg_query($connect, "SELECT  *FROM faculties");
    while ($row2=pg_fetch_row($result2))
    {
      print "<option value=".$row2[0].">";
        print $row2[1];
      print"</option>";
    }


?>
</select>

	
<div id="content"></div>







<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
          </div>
          
          <div class="table-responsive">
           
			
          </div>
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
