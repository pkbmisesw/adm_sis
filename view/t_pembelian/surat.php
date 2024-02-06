<?php

include '../../config.php';

$id = $_GET['id'];


$logo = '../../images/gpilogo.png';
$maskot = '../../images/modi.png';


$sql = $conn->prepare("SELECT * FROM m_pembelian ORDER BY id ASC");
$sql->execute();
while($data=$sql->fetch()) {

$html = '
<html>
<head>
</head>
<body>

<table width="100%" style=" border-bottom: 2px solid blue;">
<tr>
<td width="22%" style="color:#0000BB; ">

<span style="font-weight: bold; font-size: 14pt;">
    <img src="'.$logo.'" width="70px">
</span>

<td width="78%" style="text-align: right; font-family: Arial; ">
<span style=" font-size: 14pt; font-family: Arial; color:blue;">DAFTAR PEMBELIAN</span><br/>
<span style=" font-size: 12pt; font-family: Arial; color:blue;">Toko Tiga Bintang Jaya</span><br/>
<span style=" font-size: 9pt; font-family: Arial; color:blue;">Jl. Griya Paniki Indah No. 76 Manado 95125 Telp 0431-858268</span>
</td>
</tr>
</table>



<br>
<div style="font-weight: bold; font-size: 14pt; font-family: Arial; text-align: center; "><u>Daftar Pembelian</u>
</div>
<div style="font-size: 12pt; font-family: Arial; text-align: center;">Nomor Transaksi : '.$data['id_trx'].'
</div>


<table width="100%" style="margin-top:10px; margin-left:80px; margin-right:40px;">


<tr>
<td width="40%" style=" font-size: 12pt; font-family: Arial;  vertical-align: top; text-align: left;">Tanggal</td>
<td width="1%" style=" font-size: 12pt; font-family: Arial; vertical-align: top; text-align: left;">:</td>
<td width="59%" style=" font-size: 12pt; font-family: Arial; line-height: 1.5; text-align: justify;">'.date("d/m/Y, H:i:s", strtotime($data["created_at"])).'
</td>
</tr>

<tr>
<td width="40%" style=" font-size: 12pt; font-family: Arial;  vertical-align: top; text-align: left;">Metode Pembelian</td>
<td width="1%" style=" font-size: 12pt; font-family: Arial; vertical-align: top; text-align: left;">:</td>
<td width="59%" style=" font-size: 12pt; font-family: Arial; line-height: 1.5; text-align: justify;">Cash
</td>
</tr>

<tr>
<td width="40%" style=" font-size: 12pt; font-family: Arial;  vertical-align: top; text-align: left;">Sub Total</td>
<td width="1%" style=" font-size: 12pt; font-family: Arial; vertical-align: top; text-align: left;">:</td>
<td width="59%" style=" font-size: 12pt; font-family: Arial; line-height: 1.5; text-align: justify;">'."Rp. ".number_format($data['total'], 0). ",-".'
</td>
</tr>


</table>




<div style="font-weight: bold; font-size: 12pt; font-family: Arial; text-align: center; margin-top:10px;">Daftar Item
</div>


<table style="margin-top:30px; margin-left:40px; margin-right:30px; text-align: center; width:100%; border: 1px solid black; border-collapse: collapse;">

<tr style=" border: 1px solid black; border-collapse: collapse;">
<th  width="5%" height="30px" style="  border: 1px solid black; border-collapse: collapse;" >No</th>
<th  width="35%" style="  border: 1px solid black; border-collapse: collapse;">Nama</th>
<th  width="20%" style="  border: 1px solid black; border-collapse: collapse;">Satuan</th>
<th  width="5%" style="  border: 1px solid black; border-collapse: collapse;">Qty</th>
<th  width="15%" style="  border: 1px solid black; border-collapse: collapse;">Harga</th>
<th  width="20%" style="  border: 1px solid black; border-collapse: collapse;">Total</th>
</tr>

';

$count = 1;
$sqla = $conn->prepare("SELECT t_pembelian.nama as nama,satuan,qty,harga,t_pembelian.total as total FROM t_pembelian INNER JOIN m_pembelian ON t_pembelian.id_trx = m_pembelian.id_trx WHERE t_pembelian.id_trx = $id ");
$sqla->execute();
while($datab=$sqla->fetch()) {


	$html .= '
	  <tr>
	  <td  style=" border: 1px solid black; border-collapse: collapse;">' .$count.'.</td>
	  <td  style=" border: 1px solid black; border-collapse: collapse; vertical-align: middle; text-align: left; padding-left:5px; padding-right:5px;">' . $datab['nama'] . '</td>
	  <td  style=" border: 1px solid black; border-collapse: collapse;">' . $datab['satuan'] . '</td>
	  <td  style=" border: 1px solid black; border-collapse: collapse; vertical-align: top; vertical-align: middle; text-align: center;">' . $datab['qty'] . '</td>
	  <td  style=" border: 1px solid black; border-collapse: collapse; vertical-align: top; text-align: left; padding-left:5px; padding-right:5px;">'."Rp. ".number_format($datab['harga'], 0). ",-".'</td>
	  <td  style=" border: 1px solid black; border-collapse: collapse; vertical-align: top; text-align: left; padding-left:5px; padding-right:5px;">'."Rp. ".number_format($datab['total'], 0). ",-".'</td>
	  </tr>';
	  $count=$count+1;
  }
  
$html .= '


</table>

<table width="100%" style="margin-top:0px; margin-left:80px; margin-right:40px;">
<tr>
<td width="80%" style=" border-collapse: collapse; text-align: right;">Total Seluruh</td>
<td width="20%" style=" border-collapse: collapse;">'."Rp. ".number_format($data['total'], 0). ",-".'</td>
</tr>
</table>


</body>

</html>


';

}


// $path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
// require_once $path . '/vendor/autoload.php';
require_once '../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 8,
	'margin_right' => 8,
	'margin_top' => 4,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);

$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Surat Tugas - Koordinasi");
$mpdf->SetAuthor("BPSDMP Kominfo Manado");
$mpdf->SetWatermarkText("");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();
