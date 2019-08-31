<?php

namespace App\Http\Controllers;
use App\Data;
use Illuminate\Http\Request;
use PDF;

use DB;
class HomeController2 extends Controller
{
  public function demoGeneratePDF()
{
set_time_limit(600);


$data = ['title' => 'invoice'];

$pdf = PDF::loadView('invoicelist', $data);

return $pdf->download('demo.pdf');

//return $pdf->stream('test.pdf'); //แบบนี้จะ stream มา preview
      //return $pdf->download('test.pdf'); //แบบนี้จะดาวโหลดเลย
}

public function getPdflist($type = 'stream')

{
  $data = DB::table('data')->select('inv','order_no','order_date','name','shipping', DB::raw('SUM(order_net) as sum'))
                ->groupBy('inv','order_no','order_date','name','shipping')->get();

    $pdf = app('dompdf.wrapper')->loadView('invoicelist', ['data' => $data]);

    if ($type == 'stream') {
        return $pdf->stream('invoicelist.pdf');
    }

    if ($type == 'download') {
        return $pdf->download('invoicelist.pdf');
    }
    return $order->getPdf(); // Returns stream default
    return $order->getPdf('download'); // Returns the PDF as download
}


}
