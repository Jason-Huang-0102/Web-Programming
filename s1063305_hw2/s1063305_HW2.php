<?php

require_once('tcpdf/tcpdf_import.php');

/*---------------- Sent Mail Start -----------------*/

$name = $_POST['name'];
$phone = $_POST['phone'];
$id=$_POST['id'];
$rating=$_POST['rating'];
$thingsliked=$_POST['thingsliked'];
$email=$_POST['email'];
$numberone=$_POST['numberone'];
$numbertwo=$_POST['numbertwo'];
$numberthree=$_POST['numberthree'];
$numberfour=$_POST['numberfour'];

$subject = '訂單成功';
$html = <<<EOF


<table border = "2" width = "480" height = "50">
	<tr>
	<td style = "text-align: center;" colspan="4" color = "red">訂單資料</td>
	
	</tr>
	
	<tr>
	<td style = "text-align: center;">姓名</td>
	<td color = "blue" style = "text-align: center;">$name</td>
	<td style = "text-align: center;">信箱</td>
	<td color = "blue" style = "text-align: center;">$email</td>
	</tr>
	
	<tr>
	<td   style = "text-align: center;">縣市</td>
	<td   color = "blue" style = "text-align: center;">$rating</td>
	<td   style = "text-align: center;">手機</td>
	<td   color = "blue" style = "text-align: center;">$phone</td>
	</tr>
	
	<tr>
	<td   style = "text-align: center;">身分證號碼</td>
	<td   color = "blue" style = "text-align: center;">$id</td>
	<td   style = "text-align: center;">滿意度</td>
	<td   color = "blue" style = "text-align: center;">$thingsliked</td>
	</tr>
	
</table>
EOF;
	
$to      = '$email';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


mail($to, $subject,$html,$headers,$email);




/*---------------- Sent Mail End -------------------*/
/*---------------- Print PDF Start -----------------*/
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('cid0jp','', 18); 
$pdf->AddPage();


$html = <<<EOF


<table border = "2" width = "480" height = "50">
	<tr>
	<td style = "text-align: center;" colspan="4" color = "red">訂單資料</td>
	
	</tr>
	
	<tr>
	<td style = "text-align: center;">姓名</td>
	<td color = "blue" style = "text-align: center;">$name</td>
	<td style = "text-align: center;">信箱</td>
	<td color = "blue" style = "text-align: center;">$email</td>
	</tr>
	
	<tr>
	<td   style = "text-align: center;">縣市</td>
	<td   color = "blue" style = "text-align: center;">$rating</td>
	<td   style = "text-align: center;">手機</td>
	<td   color = "blue" style = "text-align: center;">$phone</td>
	</tr>
	
	<tr>
	<td   style = "text-align: center;">身分證號碼</td>
	<td   color = "blue" style = "text-align: center;">$id</td>
	<td   style = "text-align: center;">滿意度</td>
	<td   color = "blue" style = "text-align: center;">$thingsliked</td>
	</tr>
	
	<tr>
	<td height = "150px"  colspan="3" color = "blue" style = "text-align: center;"><img src = "1234567.jpg"/></td>
	<td height = "150px"  colspan="1" style = "text-align: center;">套餐Ax$numberone</td>
	</tr>
	
	<tr>
	<td height = "150px"  colspan="3" color = "blue" style = "text-align: center;"><img src = "1234.jpg"/></td>
	<td height = "150px"  colspan="1" style = "text-align: center;">套餐Bx$numbertwo</td>
	</tr>
	
	<tr>
	<td height = "150px"  colspan="3" color = "blue" style = "text-align: center;"><img src = "12345.jpg"/></td>
	<td height = "150px"  colspan="1" style = "text-align: center;" >套餐Cx$numberthree</td>
	</tr>
	
	<tr>
	<td height = "150px"  colspan="3" color = "blue" style = "text-align: center;"><img src = "123456.jpg"/></td>
	<td height = "150px"  colspan="1" style = "text-align: center;">套餐Dx$numberfour</td>
	</tr>
	
</table>
EOF;

$pdf->write2DBarcode('www.tcpdf.org','QRCODE,L',10,20,30,40,$style,'N');
$pdf->Ln();

/*---------------- Print PDF End -------------------*/

$pdf->writeHTML($html);
$pdf->lastPage();
$pdf->Output('order.pdf', 'I');


?>