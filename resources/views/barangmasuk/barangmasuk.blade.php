@extends('layouts.app', ['page' => __('Barang'), 'pageSlug' => 'barang'])

@section('content')
<div class="">
  <div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->
    <div class="sidebar-wrapper">
      <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-mini">
          CT
        </a>
        <a href="javascript:void(0)" class="simple-text logo-normal">
          Madina Tim
        </a>
      </div>
      <ul class="nav">
        <li>
          <a href="/dashboard">
            <i class="tim-icons icon-chart-pie-36"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li>
          <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
              <i class="fab fa-laravel"></i>
              <span class="nav-link-text">Master</span>
              <b class="caret mt-1"></b>
          </a>
              <div class="collapse" id="laravel-examples">
                  <ul class="nav pl-4">
                      <li>
                          <li>
                              <a href="/barang">
                                  <i class="tim-icons icon-book-bookmark  "></i>
                                  <p>Inventory</p>
                              </a>
                          </li>
                          <li>
                              <a href="/supplier">
                              <i class="tim-icons icon-puzzle-10"></i>
                              <p>Supplier</p>
                              </a>
                          </li>
                          <li>
                              <a href="/user">
                                  <i class="tim-icons icon-single-02"></i>
                                  <p>User Profile</p>
                              </a>
                          </li>
                          <li>
                              <a href="/lokasi">
                                  <i class="tim-icons icon-square-pin"></i>
                                  <p>Location</p>
                              </a>
                          </li>
                          <li>
                              <a href="/kategori">
                                  <i class="tim-icons icon-tag"></i>
                                  <p>Category</p>
                              </a>
                          </li>
                      </li>
                  </ul>
              </div>
        </li>
        <li>
          <a data-toggle="collapse" href="#laravel1" aria-expanded="true">
              <i class="fab fa-laravel"></i>
              <span class="nav-link-text">Transaksi</span>
              <b class="caret mt-1"></b>
          </a>
              <div class="collapse show" id="laravel1">
                  <ul class="nav pl-4">
                  <li>
                      <li class="active">
                          <a href="/barangmasuk">
                          <i class="tim-icons icon-bell-55"></i>
                          <p>Incoming Inventory</p>
                          </a>
                      </li>
                      <li>
                          <a href="/barangkeluar">
                          <i class="tim-icons icon-upload"></i>
                          <p>Out Inventory</p>
                          </a>
                      </li>
                  <li>
                  </ul>
              </div>
        </li>
        <li>
          <a href="/stok">
            <i class="tim-icons icon-puzzle-10"></i>
            <p>Stock</p>
          </a>
        </li>
        <li>
          <a href="/pinjambarang">
            <i class="tim-icons icon-puzzle-10"></i>
            <p>Borrow Goods</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
  <div class="main-panel">
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h2 class="card-title">Incoming Inventory</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="modal-body">
                <form method="POST" action="/barangmasuk/store">
                {{ csrf_field() }}
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Name"><p color="black">Name</h5>
                      <div class="col-12">
                        <select name="kode_barang" class="form-control" placeholder="Code" required>
                          @foreach ($barang as $brg)
                            <option value = "{{ $brg->kode_barang}}">{{$brg->nama_barang}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Date Of Incoming"><p color="black">Date Of Incoming</h5>
                      <div class="col-12">
                        <input type="date" name="tgl_masuk" class="form-control" placeholder="Date Of Incoming" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Total In Incoming"><p color="black">Total In Incoming</h5>
                      <div class="col-12">
                        <input type="number" name="jml_brg_masuk" class="form-control" placeholder="Total In Incoming" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Name Supplier"><p color="black">Name Supplier</h5>
                      <select name="kode_supplier" class="form-control" placeholder="Code" required>
                        @foreach ($supplier as $supplier)
                          <option value = "{{ $supplier->kode_supplier}}">{{$supplier->nama_supplier}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Inventory</button>
                  </div>
                  </form>
                  <div class="card ">
                    <div class="card-header">
                      <h4 class="card-title"> Table Incoming Inventory </h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table tablesorter" id="">
                          <thead class=" text-primary">
                            <tr>
                              <th>
                                Number
                              </th>
                              <th>
                                Name Inventory
                              </th>
                              <th>
                                Date Of Incoming
                              </th>
                              <th>
                                Total In Incoming
                              </th>
                              <th>
                                Name Supplier
                              </th>
                              <th>
                                Action
                              </th>
                            </tr>
                          </thead>
                          @foreach ($barangmasuk as $barangmasuk)
                          <tbody>
                            <tr>
                              <td> {{ $loop -> iteration }} </td>
                              <td> {{ $barangmasuk -> ModelBarang['nama_barang'] }} </td>
                              <td> {{ $barangmasuk -> tgl_masuk }} </td>
                              <td> {{ $barangmasuk -> jml_brg_masuk }} </td>
                              <td> {{ $barangmasuk -> ModelSupplier['nama_supplier'] }} </td>
                              <td>
                                <a href="/barangmasuk/edit/{{ $barangmasuk->kode_barang }}">
                                  <button href="" class="btn btn-light btn-sm"> Edit </button>
                                </a>
                                <a href="/barangmasuk/hapus/{{ $barangmasuk->id_brgmasuk }}">
                                  <button class="btn btn-danger btn-sm"> Delete </button>
                                </a>
                                <a href="/barangmasuk/pdf/{{ $barangmasuk->id_brgmasuk }}">
                                  <button class="btn btn-success btn-sm"> Cetak </button>
                                </a>
                              </td>
                            </tr>
                          </tbody>
                          @endforeach
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
