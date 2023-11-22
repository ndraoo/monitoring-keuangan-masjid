<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TabunganController extends Controller
{
    //
    public function index()
    {
        $tabungan = Tabungan::get();
        return view('tabungan.isi-saldo', compact('tabungan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tabungan $tabungan)
    {
        return view('tabungan/inedit');
    }

    public function update(Request $request, Tabungan $tabungan)
    {
        $request->validate([
            'tabungan' => 'required',
            'tanggal' => 'required',
        ]);

        $tabungan->update($request->all());

        return redirect()->route('pemasukans.index')
            ->with('success', 'pemasukan updated successfully');
    }
}
