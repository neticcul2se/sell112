<?php $ssidorder2 = 0;

?>
{{ Session::put('idorder2', "")}}

@foreach($data as $row)
{{ Session::put('idorder', $row->order_no)}}

<?php

     //$newText = str_replace(';','', Session::get('test'));
      $ssidorder = Session::get('idorder');
       $ssidorder2 = Session::get('idorder2');
     if($ssidorder==$ssidorder2){
      ?>
@continue
      <?php
     }


 ?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@page {
  size: A4;
  margin: 40px;
}

</style>

<style type="text/css">
.footer-last{
  
   margin-top:10px;
  padding-left:25px;
  
}
h3 {
  padding: 0px;
  margin: 0px;
}
.page-break {
    page-break-after: always;
    
}

.page-break:last-child {
    page-break-after: avoid;
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





</style>
</head>

<body>

<div class="main">

<div class="t1">


<table width="100%"  >

<tr>

<td width="60%">

<h2>บริษัท โฟร์ ยู ทู (ไทยแลนด์) จำกัด สำนักงานใหญ่</h2>
98/36  หมู่ที่ 3 ตำบลศาลายา <br>
อำเภอพุทธมณฑล จังหวัดนครปฐม 73170 <br>
โทร. 034 300971 แฟ็กซ์ 034 300971 <br>
เลขประจำตัวผู้เสียภาษี 0735561005859 <br>

<b>ลูกค้า</b><br>
<!-- ชื่อลูกค้า -->
ชื่อ Name : {{ $row->name }}  <br />
ที่อยู่ Address : {{ $row->address_1 	 }} {{ $row->district 	 }} {{ $row->province 	 }} {{ $row->zip 	 }}   <br />
วันที่ Date :  {!! Helper::changeDate($row->order_date) !!} <br />
</td>

<td align="left" valign="top" >
<h2 align="right">   เลขที่ {{ $row->inv }} </h2>
<p align="right">ใบเสร็จรับเงิน / ใบกำกับภาษี/ ใบส่งของ <br>
RECEIPT / TAX INVOICE / DELIVERY ORDER </p>
</td>

</tr>

</table>
</div>

<br />
<div class="invoice">
  <!-- <table class="">
   <tr>
    <th>id</th>
    <th>Name</th>
    <th>date</th>
    <th>Address</th>
    <th>City</th>
    <th>Postal Code</th>
    <th>Country</th>

   </tr>

   <tr>
    <td>{{ $row->order_no }}</td>
    <td>{{ $row->order_date }}</td>
    <td>{{ $row->name }} </td>
    <td>{{ $row->address_1	 }}   {{ $row->district}} </td>
    <td>{{ $row->province }}</td>
    <td></td>
    <td></td>
   </tr>

  </table> -->


    <table width="100%">
        <thead>
          <tr>
            <td colspan="5"> <hr> </td>
          </tr>
        <tr>
            <th align="left">รหัสสินค้า</th>
            <th width="60%">รายละเอียด</th>
            <th align="right">จำนวน</th>
            <th align="right">ราคาต่อหน่วย</th>
            <th align="right">ยอดรวม</th>
        </tr>
        <tr>
          <td colspan="5"> <hr> </td>
        </tr>
        </thead>
        <tbody>
          <?php
          $dis=0;
          $total=0;
          $net=0;
          ?>
             @foreach($data as $row2)

             <?php


                   if($ssidorder==$row2->order_no)
                   {?>
                     {{ Session::put('idorder2', $row2->order_no)}}

                     <tr>
                         <td>{{ $row2->sku }}</td>
                         <td>{{ $row2->ProductName }}</td>
                         <td align="right">{{ $row2->quantity}}</td>
                         <td align="right"><?php echo number_format( $row2->price ,2);?></td>
                         <td align="right"><?php echo number_format($row2->quantity*$row2->price,2);?></td>

                     </tr>

                       <?php

                         $net=$net+$row2->order_net;
                         $total=$total+($row2->quantity*$row2->price);
                         $dis=$dis+$row2->discount;

                         $shipping=$row2->shipping;


                   }
                   else{

                   }

                     ?>

        @endforeach
        <?php
                    $net=$net+$shipping;
                    $novat=number_format($net-($net*7/107),2,'.','');
                    $vat=number_format($net*7/107,2,'.','');


        ?>
        <tr>
          <td colspan="5"> <hr> </td>
        </tr>

                <tr>


  <td align="left">shipping</td>
                    <td align="left"></td>
                    <td align="right" > <?php if($shipping>0)
                    {
                            echo "1";
                    }else {
                       echo "0";
                    }
                                                                       ?> </td>
                   <td align="right" > <?=$shipping; ?>  </td>
                      <td align="right" >  <?=$shipping; ?> </td>

            </tr>


        </tbody>

        <tfoot>

        <tr>

            <td colspan="3"></td>

            <td align="center">รวมเป็นเงิน</td>
            <td align="right" class="gray"><?php echo number_format($net-$vat,2); ?></td>

    </tr>
        <tr>
            <td colspan="3"></td>
            <td  align="center"> ภาษีมูลค่าเพิ่ม 7%  </td>
            <td align="right">  <?php echo number_format($vat,2); ?> </td>
        </tr>

              <tr>
                <td colspan="3"></td>
              <td align="center">จำนวนเงินทั้งสิ้น</td>
              <td align="right"> <?php echo number_format($net,2); ?></td>
              </tr>



        </tfoot>

    </table>
    <hr>



    <br />
    <br />
</div>

<div class="total" style="position: absolute; bottom: 110px;">

<div class="total2">



</div>




</div>


</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr >
            <td align="center"  style="width:30%; ">
              ผู้รับสินค้า / Recever
            </td>

            <td align="center"  style="width:30%;"  >
              ผู้ส่งสินค้า / Delivered
            </td>

            <td align="center"  style="width: 30%;">
              บัญชี การเงิน / Cashier
            </td>

        </tr>
        <tr >
          <td style="width: 33%; " align="center"  class="f3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------------------------------------</td>
          <td style="width: 33%;" align="center"   class="f3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------------------------------------</td>
          <td style="width: 33%;" align="center"   class="f3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------------------------------------</td>
        </tr>
        <tr  >
          <td style="width: 30%; " align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
          <td style="width: 30%;" align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
          <td style="width: 30%;" align="center">( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>

        </tr>

        <tr margin="0;">
          <td  class="f3" style="width: 30%;" align="center" > วันที่ / Date_ _ _ _ _ _ _ _ _ _ _ _ _ </td>
          <td class="f3" style="width: 30%;" align="center" > วันที่ / Date_ _ _ _ _ _ _ _ _ _ _ _ _ </td>
          <td class="f3" style="width: 30%;" align="center">  วันที่ / Date_ _ _ _ _ _ _ _ _ _ _ _ _ </td>
        </tr>
    </table>
    <div  class="footer-last">
        หมายเหตุ : ผู้บริโภคมีสิทธิเลิกสัญญาโดยการส่งหนังสือแสดงเจตนาได้ภายใน 7 วัน นับแต่วันที่ได้รับสินค้า และผู้ประกอบธุรกิจฯ จะคืนเงินเต็มจำนวนที่ผู้บริโภคได้จ่ายไปเพื่อซื้อสินค้าภายใน 15 วัน นับแต่วันที่ผู้บริโภคใช้สิทธิในการคืนสินค้า
    </div>
</div>

<div  class="page-break"></div>
@endforeach
</div>
</body>
</html>
