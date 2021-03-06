@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

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
              <div class="collapse show" id="laravel-examples">
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
                          <li class="active">
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
              <div class="collapse" id="laravel1">
                  <ul class="nav pl-4">
                  <li>
                      <li>
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
                  <h2 class="card-title">Madina Location</h2>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="modal-body">
              <form method="POST" action="/lokasi/store">
                {{ csrf_field() }}
                <div class="form-row">
                  <h5 class="my-1 mr-2" for="Code Location"><p color="black">Code</h5>
                    <div class="col-12">
                      <input type="text" name="kode_lokasi" value='{{ $code }}' class="form-control" placeholder="Code Location" required readonly>
                    </div>
                </div>
                <div class="form-row">
                  <h5 class="my-1 mr-2" for="Name Location"><p color="black">Name</h5>
                    <div class="col-12">
                      <input type="text" name="nama_lokasi" class="form-control" placeholder="Name Location" required>
                    </div>
                </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save Location</button>
                    </div>
                </form>
                <div class="card ">
                  <div class="card-header">
                    <h4 class="card-title"> Table Location </h4>
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
                              Code Location
                            </th>
                            <th>
                              Name Location
                            </th>
                            <th>
                              Action
                            </th>
                          </tr>
                        </thead>
                        @foreach ($lokasi as $lokasi)
                        <tbody>
                          <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td> {{ $lokasi -> kode_lokasi }} </td>
                            <td> {{ $lokasi -> nama_lokasi }} </td>
                            <td>
                              <a href="/lokasi/edit/{{ $lokasi->kode_lokasi }}">
                                <button href="" class="btn btn-light btn-sm"> Edit </button>
                              </a>
                              <a href="/lokasi/hapus/{{ $lokasi->kode_lokasi }}">
                                <button class="btn btn-danger btn-sm"> Delete </button>
                              </a>
                              <a href="/lokasi/pdf/{{ $lokasi->kode_lokasi }}">
                                <button class="btn btn-success btn-sm"> Print </button>
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
@endsection
