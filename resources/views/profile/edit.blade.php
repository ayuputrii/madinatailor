@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
<body class="">
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
          <li>
            <a href="/dashboard">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="/barang">
              <i class="tim-icons icon-book-bookmark"></i>
              <p>Inventory</p>
            </a>
          </li>
          <li>
            <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                <i class="fab fa-laravel"></i>
                <span class="nav-link-text">User Management</span>
                <b class="caret mt-1"></b>
            </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li class="active ">
                            <a href="/user">
                                <i class="tim-icons icon-single-02"></i>
                                <p>User Profile</p>
                            </a>
                        </li>
                        <li>
                            <a href="user/create">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>User Management</p>
                            </a>
                        </li>
                    </ul>
                </div>
          </li>
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
            <a href="/supplier">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Supplier</p>
            </a>
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
    <div class="main-panel">
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ _('Edit Profile') }}</h5>
                        </div>
                        <form method="post" action="{{ route('profile.edit') }}" autocomplete="off">
                            <div class="card-body">
                                    @csrf
                                    @method('put')
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label>{{ _('Name') }}</label>
                                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label>{{ _('Email address') }}</label>
                                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email address') }}" value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                            </div>
                        </form>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ _('Password') }}</h5>
                        </div>
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            <div class="card-body">
                                @csrf
                                @method('put')
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label>{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label>{{ __('New Password') }}</label>
                                    <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary">{{ _('Change password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="card-body">
                            <p class="card-text">
                                <div class="author">
                                    <div class="block block-one"></div>
                                    <div class="block block-two"></div>
                                    <div class="block block-three"></div>
                                    <div class="block block-four"></div>
                                    <a href="#">
                                        <img class="avatar" src="{{ asset('black') }}/img/emilyz.jpg" alt="">
                                        <h5 class="title">{{ auth()->user()->name }}</h5>
                                    </a>
                                    <p class="description">
                                        {{ _('Ceo/Co-Founder') }}
                                    </p>
                                </div>
                            </p>
                            <div class="card-description">
                                {{ _('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="button-container">
                                <button class="btn btn-icon btn-round btn-facebook">
                                    <i class="fab fa-facebook"></i>
                                </button>
                                <button class="btn btn-icon btn-round btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button class="btn btn-icon btn-round btn-google">
                                    <i class="fab fa-google-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
  </div>
  @endsection
