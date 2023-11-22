<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TotalController extends Controller
{
    //menampilkan data berdasarkan range tanggwal dari dan sampai.
    public function tampilPertanggal($tgl)
    {
        $lastTabungan = Tabungan::latest()->first();


        // ------------------ //
        $tanggal  = Pemasukan::first('tanggal');
        $tabung = Tabungan::latest()->first('uang');
        $tat = Pengeluaran::with('pemasukan')->where('tanggal', [$tgl])->get();
        $tot = Pemasukan::with('pengeluaran')->where('tanggal', [$tgl])->get();
        // ------------------ //

        if (!$lastTabungan) {
            $hasil_perhitungan = $tabung->sum('uang') + $tot->sum('saldo') - $tat->sum('nominal');
        } else {
            // hitung perbedaan antara total uang saat ini dan saat terakhir disimpan
            $diff = $tabung->sum('uang') + $tot->sum('saldo') - $tat->sum('nominal') - $lastTabungan->uang;

            // jika tidak ada perbedaan, maka tidak perlu menyimpan data baru
            if ($diff == 0) {
                return;
            }

            // hitung hasil perhitungan berdasarkan perbedaan dan uang terakhir
            $hasil_perhitungan = $lastTabungan->uang + $diff;
        }
        $diff = $tabung->sum('uang') + $tot->sum('saldo') - $tat->sum('nominal') - $lastTabungan->uang;
        $hasil_perhitungan = $lastTabungan->uang + $diff;
        $tet = new Tabungan;
        $tet->uang = $hasil_perhitungan;
        $tet->tanggal = $tgl;
        $tet->save();
        return view('total.totalcetak', compact('tot', 'tat', 'tabung', 'tanggal', "tet"));
    }
}
