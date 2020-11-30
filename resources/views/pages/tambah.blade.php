@extends('layouts.app', ['page' => __('Barang'), 'pageSlug' => 'tambah'])

@section('content')
<form action="/barang/store" method="post">
    {{ csrf_field() }}
    <div class="form-group">
          <label for="exampleInputkodebrg">Kode barang *</label>
          <input type="text" name="kode_barang" class="form-control" id="exampleInputkodebrg" aria-describedby="emailHelp" placeholder="Enter Name Barang" required="required">
    </div>

  <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
       
        <div class="form-group">
          <label for="exampleInputnameBrng">Nama Barang</label>
          <input type="text" name="nama_barang" class="form-control" id="exampleInputnameBrng" aria-describedby="emailHelp" placeholder="Enter Name Barang" required="required">
        </div>
        <div class="form-group">
          <label for="exampleInputSpesifikasi">Spesifikasi</label>
          <input type="text" name="spesifikasi" class="form-control" id="exampleInputSpesifikasi" placeholder="Enter Spesifikasi" required="required">
        </div>
        <div class="form-group">
          <label for="exampleInputlkasibrg">Lokasi Barang</label>
          <input type="text" name="lokasi_barang" class="form-control" id="exampleInputlkasibrg" placeholder="Enter Lokasi Barang" required="required">
        </div>
        <div class="form-group">
          <label for="exampleInputkategori">Kategori</label>
          <input type="text" name="kategori" class="form-control" id="exampleInputkategori" placeholder="Enter Kategori" required="required">
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        
        <div class="form-group">
          <label for="exampleInputjmlbrg">jumlah barang</label>
          <input type="number" name="jml_barang" class="form-control" id="exampleInputjmlbrg" required="required">
        </div>
        <div class="form-group">
          <label for="exampleInputkondisi">Kondisi</label>
          <input type="text" name="kondisi" class="form-control" id="exampleInputkondisi" placeholder="Enter Kondisi" required="required">
        </div>
        <div class="form-group">
          <label for="exampleInputjenbal">Jenis Barang</label>
          <input type="text" name="jenis_barang" class="form-control" id="exampleInputjenbal" placeholder="Enter Jenis Barang" required="required">
        </div>
        <div class="form-group">
          <label for="exampleFormControlsumdan">Sumber Dana</label>
          <select class="form-control" name="sumber_dana" id="exampleFormControlsumdan" required="required">
            <option>Select Dana</option>  
            <option>BRI</option>
            <option>PKI</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>
<button type="submit" value="simpan data" class="btn btn-success">Save</button>
</form>
@endsection