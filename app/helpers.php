<?php


namespace App\Helpers;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);


      }


public static function m2t($number){
$number = number_format($number, 2, '.', '');
$numberx = $number;
$txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
$txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
$number = str_replace(",","",$number);
$number = str_replace(" ","",$number);
$number = str_replace("บาท","",$number);
$number = explode(".",$number);
if(sizeof($number)>2){
return 'ทศนิยมหลายตัวนะจ๊ะ';
exit;
}
$strlen = strlen($number[0]);
$convert = '';
for($i=0;$i<$strlen;$i++){
	$n = substr($number[0], $i,1);
	if($n!=0){
		if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; }
		elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; }
		elseif($i==($strlen-2) AND $n==1){ $convert .= ''; }
		else{ $convert .= $txtnum1[$n]; }
		$convert .= $txtnum2[$strlen-$i-1];
	}
}

$convert .= 'บาท';
if($number[1]=='0' OR $number[1]=='00' OR
$number[1]==''){
$convert .= 'ถ้วน';
}else{
$strlen = strlen($number[1]);
for($i=0;$i<$strlen;$i++){
$n = substr($number[1], $i,1);
	if($n!=0){
	if($i==($strlen-1) AND $n==1){$convert
	.= 'เอ็ด';}
	elseif($i==($strlen-2) AND
	$n==2){$convert .= 'ยี่';}
	elseif($i==($strlen-2) AND
	$n==1){$convert .= '';}
	else{ $convert .= $txtnum1[$n];}
	$convert .= $txtnum2[$strlen-$i-1];
	}
}
$convert .= 'สตางค์';
}
//แก้ต่ำกว่า 1 บาท ให้แสดงคำว่าศูนย์ แก้ ศูนย์บาท
if($numberx < 1)
{
	$convert = "ศูนย์" .  $convert;
}

//แก้เอ็ดสตางค์
$len = strlen($numberx);
$lendot1 = $len - 2;
$lendot2 = $len - 1;
if(($numberx[$lendot1] == 0) && ($numberx[$lendot2] == 1))
{
	$convert = substr($convert,0,-10);
	$convert = $convert . "หนึ่งสตางค์";
}

//แก้เอ็ดบาท สำหรับค่า 1-1.99
if($numberx >= 1)
{
	if($numberx < 2)
	{
		$convert = substr($convert,4);
		$convert = "หนึ่ง" .  $convert;
	}
}
return $convert;
}



public static function changeDate($date){
//ใช้ Function explode ในการแยกไฟล์ ออกเป็น  Array
$get_date = explode("/",$date);
//กำหนดชื่อเดือนใส่ตัวแปร $month
    $month = array("01"=>"ม.ค.","02"=>"ก.พ","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
//month
$get_month = $get_date["1"];

//year
$year = $get_date["2"]+543;

return $get_date["0"]." ".$month[$get_month]." ".$year;

}

public static function changeDate2($date){
//ใช้ Function explode ในการแยกไฟล์ ออกเป็น  Array
$get_date = explode("/",$date);
//กำหนดชื่อเดือนใส่ตัวแปร $month
    $month = array("01"=>"ม.ค.","02"=>"ก.พ","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
//month
$get_month = $get_date["1"];

//year
$year =  substr( $get_date["2"], -2);


return $get_date["0"]." ".$month[$get_month]." ".$year;

}





}


?>
