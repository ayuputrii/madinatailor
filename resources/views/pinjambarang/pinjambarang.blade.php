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
        <li class="active">
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
                    <h2 class="card-title">Borrow Goods</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="modal-body">
                <form method="POST" action="/pinjambarang/store">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Number Borrow"><p color="black"> Number Borrow </h5>
                      <div class="col-12">
                        <input type="text" name="no_pinjam" value='{{ $code }}' class="form-control" placeholder="Number Borrow" required readonly>
                      </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Date Of Goods"><p color="black">Date Of Goods</h5>
                      <div class="col-12">
                        <input type="date" name="tgl_pinjam" class="form-control" placeholder="Date Of Goods" required>
                      </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Name Inventory"><p color="black">Name Inventory</h5>
                      <div class="col-12">
                        <select name="kode_barang" class="form-control" placeholder="Name Inventory" required>
                          @foreach ($barang as $brg)
                            <option value = "{{ $brg->kode_barang}}">{{$brg->nama_barang}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Total Borrow"><p color="black">Total Borrow</h5>
                      <div class="col-12">
                        <input type="number" name="jml_pinjaman" class="form-control" placeholder="Total Borrow" required>
                      </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Borrowing"><p color="black">Borrowing</h5>
                      <div class="col-12">
                        <input type="text" name="peminjaman" class="form-control" placeholder="Borrowing" required>
                      </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Date Of Out"><p color="black">Date Of Out</h5>
                      <div class="col-12">
                        <input type="date" name="tgl_kembali" class="form-control" placeholder="Date Of Out" required>
                      </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Information"><p color="black">Information</h5>
                      <div class="col-12">
                        <textarea name="keterangan" class="form-control" placeholder="Information" required></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Borrowing</button>
                  </div>
                  </form>
                  <div class="card ">
                    <div class="card-header">
                      <h4 class="card-title"> Table Borrow Goods </h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table tablesorter" id="">
                          <thead class=" text-primary">
                            <tr>
                              <th>
                                Number Borrow
                              </th>
                              <th>
                                Date Of Goods
                              </th>
                              <th>
                                Name Inventory
                              </th>
                              <th>
                                Total Borrow
                              </th>
                              <th>
                                Borrowing
                              </th>
                              <th>
                                Date Of Out
                              </th>
                              <th>
                                Information
                              </th>
                              <th>
                                Action
                              </th>
                            </tr>
                          </thead>
                          @foreach ($pinjambarang as $pinjambarang)
                          <tbody>
                            <tr>
                              <td> {{ $pinjambarang -> no_pinjam }} </td>
                              <td> {{ $pinjambarang -> tgl_pinjam }} </td>
                              <td> {{ $pinjambarang -> ModelBarang['nama_barang'] }} </td>
                              <td> {{ $pinjambarang -> jml_pinjaman }} </td>
                              <td> {{ $pinjambarang -> peminjaman }} </td>
                              <td> {{ $pinjambarang -> tgl_kembali }} </td>
                              <td> {{ $pinjambarang -> keterangan }} </td>
                              <td>
                                <a href="/pinjambarang/edit/{{ $pinjambarang->no_pinjam }}">
                                  <button href="" class="btn btn-light btn-sm"> Edit </button>
                                </a>
                                <a href="/pinjambarang/hapus/{{ $pinjambarang->no_pinjam }}">
                                  <button class="btn btn-danger btn-sm"> Delete </button>
                                </a>
                                <a href="/pinjambarang/pdf/{{ $pinjambarang->no_pinjam }}">
                                  <button class="btn btn-primary btn-sm"> PDF </button>
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
