<!-- view untuk menampilkan statistik -->
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Statistik</div>
  
          <div class="card-body">
            <form method="GET" action="{{ route('statistik.show') }}">
              <div class="form-group row">
                <label for="tanggal" class="col-md-4 col-form-label text-md-right">Tanggal:</label>
  
                <div class="col-md-6">
                  <input id="tanggal" type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}" autofocus>
                </div>
              </div>
  
              <div class="form-group row">
                <label for="bulan" class="col-md-4 col-form-label text-md-right">Bulan:</label>
  
                <div class="col-md-6">
                  <input id="bulan" type="month" class="form-control" name="bulan" value="{{ old('bulan') }}">
                </div>
              </div>
  
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
              </div>
            </form>
  
            <hr>
  
            @if ($pemasukan || $pengeluaran || $saldo || $tabungan)
        
  
            <div class="form-group row">
              <label for="pemasukan" class="col-md-4 col-form-label text-md-right">Total Pemasukan:</label>
  
              <div class="col-md-6">
                <input id="pemasukan" type="text" class="form-control" name="pemasukan" value="{{ $pemasukan }}" readonly>
              </div>
            </div>

            <div class="form-group row">
                <label for="pengeluaran" class="col-md-4 col-form-label text-md-right">Total Pengeluaran:</label>
    
                <div class="col-md-6">
                  <input id="pengeluaran" type="text" class="form-control" name="pengeluaran" value="{{ $pengeluaran }}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="saldo" class="col-md-4 col-form-label text-md-right">Saldo Akhir:</label>
    
                <div class="col-md-6">
                  <input id="saldo" type="text" class="form-control" name="saldo" value="{{ $saldo }}" readonly>
                </div>
              </div>
  
            <div class="form-group row">
              <label for="tabungan" class="col-md-4 col-form-label text-md-right">Total Tabungan:</label>
  
              <div class="col-md-6">
                <input id="tabungan" type="text" class="form-control" name="tabungan" value="{{ $tabungan }}" readonly>
              </div>
            </div>
  
            @else
            <p class="text-center">Tidak ada data untuk ditampilkan.</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  