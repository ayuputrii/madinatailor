<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/n.jpg')}}">
  <title>
    Inventory Batch 1!
  </title>
  <!--     Fonts and icons     -->
  <link href="{{('https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800')}}" rel="stylesheet" />
  <link href="{{'https://use.fontawesome.com/releases/v5.0.6/css/all.css'}}" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('assets/css/black-dashboard.css?v=1.0.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, dont include it in your project -->
  <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
</head>
<body class="">
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
                    <h2 class="card-title">Madina Category</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="modal-body">
                @foreach($kategori as $kategori)
                <form method="POST" action="/kategori/update/{{$kategori->kode_kategori}}">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Code Category"><p color="black">Code Category</h5>
                      <div class="col-12">
                        <input type="text" name="kode_kategori" value="{{$kategori->kode_kategori}}" class="form-control" placeholder="Code Category" required readonly>
                      </div>
                  </div>
                  <div class="form-row">
                    <h5 class="my-1 mr-2" for="Name Category"><p color="black">Name Category</h5>
                      <div class="col-12">
                        <input type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}" class="form-control" placeholder="Name Category" required>
                      </div>
                  </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                      </div>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.j')}}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="{{('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE')}}"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/black-dashboard.min.js?v=1.0.0')}}"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js')}}"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>

</html>
