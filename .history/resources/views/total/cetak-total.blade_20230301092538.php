    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cetak Data Pertanggal</title>
    </head>
    <body>
        <div class="form-group">
            <p align="center"><b>Laporan Saldo Perminggu</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width : 95%;" id="example">
                {{-- @if ($tanggal == 'true')
                <h3> Tanggal{{ $total->tanggal }}</h3>
                @endif --}}
                <h3>Saldo Akhir Jumat Lalu: 80.300.000</h3>
                <h3>Tabel Pemasukan</h3>
                <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Nominal</th>
                    <th>Pengeluaran</th>
                </tr>
                @foreach ($tot as $total)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $total->keterangan }}</td>
                    <td>{{ $total->tanggal }}</td>
                    <td>{{ $total->saldo }}</td>
                    <td>@foreach ($total->pengeluaran as $item)
                        {{ $item->keterangan }}
                    @endforeach</td>
                </tr>
                @endforeach
            </table>
            <h3>Jumlah total pemasukan :  @currency ($tot->sum('saldo'))</h3>

            <table class="static" align="center" rules="all" border="1px" style="width : 95%;" id="example">
                <h3>Tabel Pengeluaran</h3>
                <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Nominal</th>
                </tr>
                
                    @foreach ($tat as $total)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $total->keterangan }}</td>
                        <td>{{ $total->tanggal }}</td>
                        <td>{{ $total->nominal }}</td>
                    </tr>
                    @endforeach
            </table>
            <h3>Jumlah total pengeluaran :  @currency ($tat->sum('nominal'))</h3>
            
            
        
        </div>
    </body>

</html>