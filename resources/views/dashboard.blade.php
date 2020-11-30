@extends('layouts.app', ['page' => __('Barang'), 'pageSlug' => 'barang'])

@section('content')
  <div class="wrapper">
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
          <li class="active">
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
  @endsection
