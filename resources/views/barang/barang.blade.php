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
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li>
                            <li class="active">
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
                    <h2 class="card-title">Inventory Madina</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="modal-body">
                <form method="POST" action="/barang/store">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Code"><p color="black">Code</h5>
                      <div class="col-12">
                        <input type="text" name="kode_barang" value='{{ $code }}' class="form-control" placeholder="Code" required readonly>
                      </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Name"><p color="black">Name</h5>
                      <div class="col-12">
                        <input type="text" name="nama_barang" class="form-control" placeholder="Name" required>
                      </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Spesifikasi"><p color="black">Spesifikasi</h5>
                      <div class="col-12">
                        <input type="text" name="spesifikasi" class="form-control" placeholder="Spesifikasi" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Location"><p color="black">Location</h5>
                        <div class="col-12">
                            <select name="kode_lokasi" class="form-control" placeholder="Code Location" required>
                              @foreach ($lokasi as $lokasi)
                                <option value = "{{ $lokasi->kode_lokasi}}">{{$lokasi->nama_lokasi}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <h5 class="my-1 mr-2" for="Code Category"><p color="black">Category</h5>
                        <div class="col-12">
                            <select name="kode_kategori" class="form-control" placeholder="Code Category" required>
                                @foreach ($kategori as $kategori)
                                  <option value = "{{ $kategori->kode_kategori}}">{{$kategori->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <h5 class="my-1 mr-2" for="Total"><p color="black">Total</h5>
                        <div class="col-12">
                          <input type="number" name="jml_barang" class="form-control" placeholder="Total" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <h5 class="my-1 mr-2" for="Condition"><p color="black">Condition</h5>
                          <div class="col-12">
                            <select class="form-control" name="kondisi" id="exampleFormControlsumdan" placeholder="Condition" required>
                              <option>Select Condition</option>
                              <option>New</option>
                              <option>Second</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <h5 class="my-1 mr-2" for="List"><p color="black">List</h5>
                        <div class="col-12">
                          <input type="number" name="jenis_barang" class="form-control" placeholder="List" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <h5 class="my-1 mr-2" for="Source"><p color="black">Source</h5>
                        <div class="col-12">
                          <select class="form-control" name="sumber_dana" id="exampleFormControlsumdan" placeholder="Source" required>
                            <option>Select Dana</option>
                            <option>BRI</option>
                            <option>BNI</option>
                            <option>Mandiri</option>
                        </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Inventory</button>
                      </div>
                  </form>
                  <div class="card ">
                    <div class="card-header">
                      <h4 class="card-title"> Table Inventory </h4>
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
                                Code
                              </th>
                              <th>
                                Name
                              </th>
                              <th>
                                Specific
                              </th>
                              <th>
                                Location
                              </th>
                              <th>
                                Category
                              </th>
                              <th>
                                Amount
                              </th>
                              <th>
                                Condition
                              </th>
                              <th>
                                Type
                              </th>
                              <th>
                                Source
                              </th>
                              <th>
                                Action
                              </th>
                            </tr>
                          </thead>
                          @foreach ($barang as $brg)
                          <tbody>
                            <tr>
                              <td>{{ $loop->iteration}}</td>
                              <td> {{ $brg -> kode_barang }} </td>
                              <td> {{ $brg -> nama_barang }} </td>
                              <td> {{ $brg -> spesifikasi }} </td>
                              <td> {{ $brg -> ModelLokasi['nama_lokasi'] }} </td>
                              <td> {{ $brg -> ModelKategori['nama_kategori'] }} </td>
                              <td> {{ $brg -> jml_barang }} </td>
                              <td> {{ $brg -> kondisi }} </td>
                              <td> {{ $brg -> jenis_barang }} </td>
                              <td> {{ $brg -> sumber_dana }} </td>
                              <td>
                                <a href="/barang/edit/{{ $brg->kode_barang }}">
                                  <button href="" class="btn btn-light btn-sm"> Edit </button>
                                </a>
                                <a href="/barang/hapus/{{ $brg->kode_barang }}">
                                  <button class="btn btn-danger btn-sm"> Delete </button>
                                </a>
                                <a href="/barang/pdf/{{ $brg->kode_barang }}">
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
