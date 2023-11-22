<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatistikController extends Controller
{
    public function index()
    {
    return view('cetak-total');
    }

    public function show(Request $request)
    {
    $tanggal = $request->input('tanggal');
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');

    $pemasukan = 0;
    $pengeluaran = 0;
    $tabungan = 0;
    $saldo = 0;

    // percabangan if untuk menghitung total pemasukan, pengeluaran, dan tabungan
    // ...

    $saldo = $tabungan + $pemasukan - $pengeluaran;

    return view('cetak-total' , compact('pemasukan', 'pengeluaran', 'tabungan', 'saldo'));
    }
}
