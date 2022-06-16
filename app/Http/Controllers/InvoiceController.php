<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index(Request $r)
    {
        if (!Session::get('nama')) {
            return redirect()->route('welcome');
        } else {
            $hari  = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
            $id_lokasi = Session::get('id_lokasi');

            $lokasi = $id_lokasi == '1' ? 'TAKEMORI' : 'SOONDOBU';
            if (empty($r->tgl1)) {
                $tgl1   = date('Y-m-') . '01';
                $tgl2   = date('Y-m-') . $hari . ' 23:00:00';
            } else {
                $tgl1   = $r->tgl1;
                $tgl2   = $r->tgl2 . ' 23:00:00';
            }
            $data = [
                'title' => 'Invoice Penjualan',
                'invoice' => DB::select("SELECT * FROM tb_invoice as a  where a.tgl_jam between '$tgl1' and '$tgl2' and a.lokasi = '$lokasi' order by a.id DESC "),
                'id_lokasi' => $id_lokasi
            ];
            // dd($data['produk']);
            return view('invoice.invoice', $data);
        }
    }
}
