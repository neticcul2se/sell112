
<?php

$page=1;
  $countloop=1;
  $order=1;
  $sumnovat=0;
  $sumvat=0;
  $sumnet=0;
  $sumallnovat=0;
  $sumallvat=0;
  $sumallnet=0;
?>

 @foreach($data as $row)
 <?php if($countloop==1){  ?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
@page {
  size: A4;
  margin: 40px;
}

</style>

<style type="text/css">
h3 {
  padding: 0px;
  margin: 0px;
}
 h2
 {

   padding: 0px;
   margin: 0px;
 }
 input[type=checkbox] { display: inline; }

@font-face{
 font-family:  'THSarabunNew';
 font-style: normal;
 font-weight: normal;
 src: url("fonts/THSarabunNew.ttf") format('truetype');
}
@font-face{
 font-family:  'THSarabunNew';
 font-style: normal;
 font-weight: bold;
 src: url("fonts/THSarabunNew Bold.ttf") format('truetype');  }
@font-face{
 font-family:  'THSarabunNew';
 font-style: italic;
 font-weight: normal;
 src: url("fonts/THSarabunNew Italic.ttf") format('truetype');
}
@font-face{
 font-family: 'THSarabunNew';
 font-style: italic;
 font-weight: bold;
 src: url("fonts/THSarabunNew BoldItalic.ttf") format('truetype');
}
body{
  font-family: "THSarabunNew";
  line-height: 100%;
  font-weight: 500;


}
.total2{
  display:inline;
}
.a1{display:block;height:1px;background:black;margin-top:25px;
width:150px; margin-left: 40px;

float:left;

}

.a11{display:block;height:1px;background:black;margin-top:25px;
width:150px; margin-left: 215px;

float:left;

}
.f1{display:block;height:1px;background:black;
width:100px;
margin-top:20px;
margin-left: 10px
float:left;

}
.f2{


}

.f3{

  padding-top:5px;
  padding-right: 20px
}

.a2{
display:inline;
margin-right:  150px;
}
.a4{
  margin-right: 20px;
}

th{

  padding: 0px;
  margin: 0px;
}
td{
  padding: 0px;
  margin: 0px;

}
hr{
  padding: 0px;
  margin: 0px;

}

.information .logo {

}
.information table {

}


.bor1{
  border: 1px solid black;
}


</style>
</head>

<body>

<div class="main">
<div class="title">
  <h2 align="center">รายงานภาษีขาย</h2>
  <table width="100%">
    <tr width="50%">
      <td>

          <b>  ชื่อผู้ประกอบกิจการ : </b> บริษัท โฟร์ ยู ทู (ไทยแลนด์) จำกัด สำนักงานใหญ่

      </td>
      <td width="50%">

           <b>  ประจำเดือน : </b> กรกฎาคม 2019

      </td>

    </tr>

    <tr width="50%">
        <td>  <b>  ชื่อสถานประกอบการ :   </b>  บริษัท โฟร์ ยู ทู (ไทยแลนด์) จำกัด สำนักงานใหญ่ </td>
        <td>  <b> เลขประจำตัวผู้เสียภาษีอากร :  </b>0735561005859 </td>
    </tr>
    <tr width="50%">
        <td>  <b>  สำนักงานใหญ่ :   </b>  - </td>
        <td>  <b> สาขาที่ :  </b>0000 </td>
    </tr>
  </table>




</div>
<br>
<div class="detail">


<table  width="100%" border="0.5"   cellspacing="0">

  <tr>
   <th rowspan="2" align="center">ลำดับที่</th>
   <th colspan="2" align="center">ใบกำกับภาษี</th>
   <th rowspan="2" align="center">ชื่อผู้ซื้อสินค้า / ผู้รับบริการ</th>
   <th rowspan="2" align="center">มูลค่าสินค้า<br>หรือบริการ</th>
   <th rowspan="2" align="center">จำนวนเงิน<br>ภาษีมูลค่าเพิ่ม</th>
   <th rowspan="2"align="center" >จำนวนเงิน<br>ยอดรวม</th>



 </tr>
 <tr>
    <th align="center">วันเดือนปี</th>
    <th align="center">เล่มที่ / เลขที่</th>
 </tr>
<?php

}




       $net=$row->sum+$row->shipping;
      $novat=$net-($net*7/107);
      $vat=$net*7/107;
      $sumnovat=$sumnovat+$novat;
      $sumvat=$sumvat+$vat;
      $sumnet=$sumnet+$net;

      $sumallnovat=$sumallnovat+$novat;
      $sumallvat=$sumallvat+$vat;

      $sumallnet=$sumallnet+$net;

  ?>
<tr>
  <td align="center"><?=$order; ?></td>
  <td align="center">{!! Helper::changeDate2($row->order_date) !!}</td>
  <td align="center">{{ $row->inv }}</td>
  <td align="left" >&nbsp;&nbsp;&nbsp;&nbsp;{{ $row->name }}</td>
  <td align="right"><?php echo number_format($novat,2); ?> &nbsp;&nbsp;&nbsp;</td>
  <td align="right"><?php echo number_format($vat,2); ?> &nbsp;&nbsp;&nbsp;</td>
  <td align="right"><?php echo number_format( $net ,2); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

</tr>
<?php


if($countloop==28){

?>
  <tfoot>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวมหน้า <?=$page; ?></td>
    <td align="right"> <?php echo number_format($sumnovat,2); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td align="right"><?php echo number_format($sumvat,2); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td align="right" ><?php echo number_format($sumnet,2); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>




  </tfoot>

</table>
</div>
<?php  $page=$page+1;
$countloop=1;

$sumnovat=0;
$sumvat=0;
$sumnet=0;
 ?>

<div style="page-break-after: always;"></div>
<?php
}else{
  $countloop=$countloop+1;
}
$order=$order+1;

 ?>
@endforeach
<tfoot>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวมหน้า <?=$page; ?></td>
  <td align="right"> <?php echo number_format($sumnovat,2); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td align="right"><?php echo number_format($sumvat,2); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td align="right" ><?php echo number_format($sumnet,2); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>

  <tr>

    <td></td>
    <td></td>
    <td></td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวมหน้า 1-<?=$page; ?></td>
    <td align="right"> <?php echo number_format($sumallnovat,2); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td align="right"><?php echo number_format($sumallvat,2); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td align="right" ><?php echo number_format($sumallnet,2); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

  </tr>



</tfoot>

</table>
</div>



</div>
</body>
</html>
