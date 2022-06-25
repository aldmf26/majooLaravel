<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function get($id_lokasi = 1)
    {
        if (isset($id_lokasi)) {
            $produk = Produk::join('tb_kategori', 'tb_produk.id_kategori', 'tb_kategori.id_kategori')->join('tb_satuan', 'tb_produk.id_satuan', 'tb_satuan.id_satuan')->where('tb_produk.id_lokasi', $id_lokasi)->orderBy('tb_produk.id_produk', 'DESC')->get();

            return response()->json(['msg' => 'Data retrieved', 'data' => $produk], 200);
        } else {
            $produk = Produk::join('tb_kategori', 'tb_produk.id_kategori', 'tb_kategori.id_kategori')->join('tb_satuan', 'tb_produk.id_satuan', 'tb_satuan.id_satuan')->orderBy('tb_produk.id_produk', 'DESC')->get();

            return response()->json(['msg' => 'Data retrieved', 'data' => $produk], 200);
        }
    }

    public function komisi($lokasi = null, $tgl1 = null, $tgl2 = null)
    {

        if ($tgl1 == '' || $tgl2 == '') {
            $month = date('m');
            $year = date('Y');

            $last_date = cal_days_in_month(CAL_GREGORIAN, $month, $year);

            $tgl1 = $year . '-' . $month . '-01';
            $tgl2 = $year . '-' . $month . '-' . $last_date;
        } else {
            $tgl1 = $tgl1;
            $tgl2 = $tgl2;
        }
        $komisi = DB::select("SELECT SUM(b.harga) as komisi_penjualan,a.id, b.no_nota, c.nm_karyawan, sum(a.komisi) AS dt_komisi, b.lokasi, d.id_kategori, e.nm_kategori,
        if(d.id_kategori = '6' , e.nm_kategori, b.lokasi) AS lokasi2
        FROM komisi AS a
        LEFT JOIN tb_pembelian AS b ON b.id_pembelian = a.id_pembelian
        LEFT JOIN tb_karyawan AS c ON c.kd_karyawan = a.id_kry
        
        LEFT JOIN tb_produk AS d ON d.id_produk = b.id_produk
        
        
        LEFT JOIN tb_kategori AS e ON e.id_kategori = d.id_kategori
        WHERE a.tgl BETWEEN '$tgl1' AND '$tgl2' AND d.id_kategori != '6' AND b.lokasi = '$lokasi'
        GROUP BY a.id_kry");

        $komisi_resto = DB::selectOne("SELECT SUM(b.harga) as beban_penjualan,SUM(a.komisi) as beban_komisi, b.*, c.*, a.* FROM `komisi` as a
        LEFT JOIN tb_pembelian as b ON a.id_pembelian = b.id_pembelian
        LEFT JOIN tb_produk as c ON b.id_produk = c.id_produk
        WHERE a.tgl BETWEEN '$tgl1' AND '$tgl2'
        AND c.id_kategori != 6
        AND a.id_kry != 418
        AND a.id_kry != 419
        GROUP BY a.id_kry");

        $komisi_orchard = DB::selectOne("SELECT SUM(a.komisi) as beban_komisi, b.*, c.*, a.* FROM `komisi` as a
        LEFT JOIN tb_pembelian as b ON a.id_pembelian = b.id_pembelian
        LEFT JOIN tb_produk as c ON b.id_produk = c.id_produk
        WHERE a.tgl BETWEEN '$tgl1' AND '$tgl2'
        AND c.id_kategori = 6
        AND a.id_kry != 418
        AND a.id_kry != 419
        GROUP BY a.id_kry");

        $dt_rules = DB::table('tb_rules')->get();
        $rules_active = DB::table('tb_rules')->where('status', 1)->first();
        $total_penjualan = DB::selectOne("SELECT SUM(a.total) as ttl_penjualan, a.* FROM `tb_invoice` as a
        WHERE a.tgl_jam BETWEEN '$tgl1' AND '$tgl2' AND status = 0");
        $data = [
            'msg' => 'Data Sukses',
            'komisi' => $komisi,
            'dt_rules' => $dt_rules,
            'rules_active' => $rules_active,
            'total_penjualan' => $total_penjualan,
            'komisi_resto' => $komisi_resto,
            'komisi_orchard' => $komisi_orchard,
            200
        ];
        return response()->json($data);
    }
}
