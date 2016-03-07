<?php
include("security/control.php");	
require_once '../tcpdf/tcpdf.php'; // Подключаем библиотеку

if(isset($_GET['id']))
{
 	 $id = $_GET['id'];
 	 //$row = $_GET['row'];
 	$connect= pg_connect("host=localhost port=5432 dbname=sework user=postgres password=postgres");

	$result_works = pg_query(" SELECT 
id,
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
date_def,
open 
FROM tamplate_vkr WHERE id ='$id';");// Запрос к выбраной работе
		$mass_works = pg_fetch_row($result_works);
		//print_r($mass_works);exit();
	$result_tamplate = pg_query("SELECT * FROM setting WHERE id ='$mass_works[17]';");// Запрос к шаблону
		$mass_tamplate=pg_fetch_row($result_tamplate);
		//print_r($mass_works);exit;
	$html= strip_tags($mass_tamplate[2], '<p><a><colgroup><table><tbody><tr><td><b><strong><br>');




	$arrayTag = array(
'1' =>'(КАФЕДРА)' ,'2' => '(ТЕМА)' ,'3' => '(КОДОKCO)','4' => '(СПЕЦИАЛЬНОСТЬ)','5' => '(Ф.И.О ИИСПОЛНИТЕЛЯ)',
'6' => '(ГРУППА)','7' => '(ПОЛ)','8' => '(ОТДЕЛЕНИЕ)','9' => '(Ф.И.О Н.РУКОВОДИТЕЛЯ)','10' => '(СТЕПЕНЬ Н.РУКОВОДИТЕЛЯ)',
'11' => '(Ф.И.О НОРМАКОНТРОЛЕРА)' ,'12' => '(СТЕПЕНЬ НОРМАКОНТРОЛЕРА)' ,'13' => '(Ф.И.О ЗАВ.КАФЕДРЫ)' ,'14' => '(СТЕПЕНЬ ЗАВ.КАФЕРДЫ)',
'15' =>'(КОНСУЛЬТАНТЫ)', '16' =>'(ДАТА ЗАЩИТЫ)'

);
	for ($i=1; $i <= 16; $i++) 
	{ 
				//$html = str_replace($arrayTag[$i] , $mass_works[$i], $html);
				$html = preg_replace($arrayTag[$i] , $mass_works[$i], $html);
		
		//print $arrayTag[$i] .'-'. $mass_works[$i];
	}
	//exit;
} elseif (isset($_GET['show'])) 
{
	 $show = $_GET['show'];
 	 //$row = $_GET['row'];
 	$connect= pg_connect("host=localhost port=5432 dbname=sework user=postgres password=postgres");

	$result_tamplate = pg_query("SELECT id, name, file_s FROM setting WHERE id ='$show';");// Запрос к шаблону
		$mass_tamplate=pg_fetch_row($result_tamplate);
		//print_r($mass_works);exit;
	$html= strip_tags($mass_tamplate[2], '<p><a><colgroup><table><tbody><tr><td><b><strong><br>');


}
else {
	print 'Error 402'; exit;
}	


	/*$connect= pg_connect("host=localhost port=5432 dbname=sework user=postgres password=postgres");
	$result2 = pg_query($connect, "SELECT  *FROM setting WHERE id ='$html'");
	$row2=pg_fetch_row($result2);
	$html= strip_tags($row2[2], '<p><a><colgroup><table><tbody><tr><td><b>');*/


  	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Pavel Archenkov');
	$pdf->SetTitle($mass_tamplate[1]);
	$pdf->SetSubject('TCPDF Tutorial');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(true);

	//$pdf->AddPage();
	$pdf->SetTextColor(0, 0, 0); 
	$pdf->SetFont('dejavuserif', '', 10);
	//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	$pdf->AddPage();
	$pdf->writeHTML($html, true, 0, true, 0);




	$pdf->Output('test.pdf','I');
?>
