<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Cari Data Tanggal : </h6>
        </div>
      </div>
    
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center justify-content-center mb-0">
            <tbody>
            
            @if ($message = Session::get('success'))
              <div class="alert alert-primary text-white">
                  <p>{{ $message }}</p>
              </div>
            @endif

            <div class="card-body col-sm">
              <div class="input-group mb-3">
                <label for="label"> </label><input type="date" name="tgl" id="tgl" class="datepicker">
                
              
              </div>
            </div>
            <div class="input-group mb-3">
              <a href="#" onclick="this.href='/tampil-data-pertanggal/'+document.getElementById('tgl').value " target="_blank" class="btn btn-primary col-md-12"><i class="fas fa-print"></i>      Tampilkan Laporan Data</a>
            </div>

            <form method="POST" action="{{ route('keuangan.bulanan.post') }}">
              @csrf
              <div class="form-group">
                  <label for="bulan">Bulan</label>
                  <select class="form-control" id="bulan" name="bulan">
                      <option value="01">Januari</option>
                      <option value="02">Februari</option>
                      <option value="03">Maret</option>
                      <option value="04">April</option>
                      <option value="05">Mei</option>
                      <option value="06">Juni</option>
                      <option value="07">Juli</option>
                      <option value="08">Agustus</option>
                      <option value="09">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="tahun">Tahun</label>
                  <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Masukkan tahun">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          
          <form method="POST" action="{{ route('keuangan.tahunan.post') }}">
            @csrf
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Masukkan tahun">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
          
          
          
            
            <thead>
              <h5>Tabel Record Data</h5>
              <tr>
                <td>Tanggal</td>
                <td>Saldo</td>
              </tr>
            </thead>
            
            <tbody>
              @foreach ($tampil as $item)
                <tr>
                  <td>{{ date('d M Y', strtotime($item->tanggal)) }}</td>
                  <td>@currency($item->uang)</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Form untuk mengirim tanggal yang di-klik sebagai request parameter -->
{{-- <form id="form-tanggal" action="/tampil-data-pertanggal" method="GET">
  <input type="hidden" name="tanggal" id="tanggal">
</form> --}}


</main>