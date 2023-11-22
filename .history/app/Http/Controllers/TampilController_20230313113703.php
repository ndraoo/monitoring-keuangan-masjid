<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TampilController extends Controller
{
    //
    public function index()
    {
        $tanggal  = Pemasukan::latest()->first('tanggal');
        $tabung = Tabungan::latest()->first('uang');
        $peng = Pengeluaran::with('pemasukan')->where('tanggal')->get();
        $pem = Pemasukan::with('pengeluaran')->where('tanggal')->get();
        $tampil = Tabungan::get();
        return view('total.tabelcetak', compact('tampil', 'pem', 'peng', 'tabung', 'tanggal'));
    }

    public function tampilData(Request $request)
    {
        $tanggal = $request->input('tgl');

        // query untuk menampilkan data pemasukan berdasarkan tanggal
        $tot = DB::table('pemasukans')->whereDate('tanggal', $tanggal)->get();

        // query untuk menampilkan data pengeluaran berdasarkan tanggal
        $tat = DB::table('pengeluarans')->whereDate('tanggal', $tanggal)->get();

        // query untuk menampilkan saldo awal pada tanggal sebelumnya
        $tabung = DB::table('tabungan')->whereDate('tanggal', $tanggal)->orderBy('tanggal', 'desc')->first();

        // query untuk menampilkan saldo akhir pada tanggal yang dipilih
        $tet = DB::table('tabungan')->whereDate('tanggal', $tanggal)->first();
        $tampil = Tabungan::get();

        return view('total.tabelcetak', compact('tot', 'tat', 'tabung', 'tet', 'tanggal', 'tampil'));
    }
}
