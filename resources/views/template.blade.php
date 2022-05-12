<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        ITAM 1
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.5') }}" rel="stylesheet" />
</head>
<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
              <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
              <span class="ms-1 font-weight-bold">ITAM</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="sidenav-main" id="sidenav-main">
            <ul class="navbar-nav">
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Office</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ (Request::is('pegawai') ? 'active' : '') }} {{ (Request::is('pegawai/*') ? 'active' : '') }}" href="{{ route('pegawai.index') }}">
                        <span class="nav-link-text ms-1">Staff</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('bagian') ? 'active' : '') }} {{ (Request::is('bagian/*') ? 'active' : '') }}" href="{{ route('bagian.index') }}">
                        <span class="nav-link-text ms-1">Division</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('branch') ? 'active' : '') }} {{ (Request::is('branch/*') ? 'active' : '') }} " href="{{ route('branch.index') }}">
                        <span class="nav-link-text ms-1">Branch</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Asset</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('assetmodel') ? 'active' : '') }} {{ (Request::is('assetmodel/*') ? 'active' : '') }}" href="{{ route('assetmodel.index') }}">
                    <span class="nav-link-text ms-1">Asset Model</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('asset') ? 'active' : '') }} {{ (Request::is('asset/*') ? 'active' : '') }}" href="{{ route('asset.index') }}">
                    <span class="nav-link-text ms-1">List Asset</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('assetrequest') ? 'active' : '') }} {{ (Request::is('assetrequest/*') ? 'active' : '') }} {{ (Request::is('itemrequest') ? 'active' : '') }} {{ (Request::is('itemrequest/*') ? 'active' : '') }}" href="{{ route('assetrequest.index') }}">
                        <span class="nav-link-text ms-1">Asset Request</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('assetapproval') ? 'active' : '') }} {{ (Request::is('assetapproval/*') ? 'active' : '') }}" href="{{ route('assetapproval.index') }}">
                        <span class="nav-link-text ms-1">Request Verification</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('purchaserequest') ? 'active' : '') }} {{ (Request::is('purchaserequest/*') ? 'active' : '') }}" href="{{ route('purchaserequest.index') }}">
                    <span class="nav-link-text ms-1">Request Procurement</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('itempurchase') ? 'active' : '') }} {{ (Request::is('itempurchase/*') ? 'active' : '') }}" href="{{ route('itempurchase.index') }}">
                    <span class="nav-link-text ms-1">Purchase Verification</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('procurement') ? 'active' : '') }} {{ (Request::is('procurement/*') ? 'active' : '') }}" href="{{ route('procurement.index') }}">
                    <span class="nav-link-text ms-1">Procurement</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('assethandover') ? 'active' : '') }} {{ (Request::is('assethandover/*') ? 'active' : '') }}" href="{{ route('assethandover.index') }}">
                    <span class="nav-link-text ms-1">Handover</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('disposalrequest') ? 'active' : '') }} {{ (Request::is('disposalrequest/*') ? 'active' : '') }}" href="{{ route('disposalrequest.index') }}">
                    <span class="nav-link-text ms-1">Disposal Request</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('disposal') ? 'active' : '') }} {{ (Request::is('disposal/*') ? 'active' : '') }}" href="{{ route('disposal.index') }}">
                    <span class="nav-link-text ms-1">Disposal List</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Agreement</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('vendor') ? 'active' : '') }} {{ (Request::is('vendor/*') ? 'active' : '') }}" href="{{ route('vendor.index') }}">
                    <span class="nav-link-text ms-1">Vendor</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Request::is('contract') ? 'active' : '') }} {{ (Request::is('contract/*') ? 'active' : '') }}" href="{{ route('contract.index') }}">
                    <span class="nav-link-text ms-1">Contract</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                    @if(Request::is('pegawai', 'bagian', 'branch','pegawai/*', 'bagian/*', 'branch/*'))
                        Office
                    @elseif(Request::is('home'))
                        Dashboard
                    @elseif(Request::is('assetmodel','assetmodel/*','assetrequest','assetrequest/*','itemrequest','itemrequest/*','assetapproval','assetapproval/*'))
                        Asset
                    @elseif(Request::is('vendor', 'vendor/*', 'contract', 'contract/*'))
                        Agreement
                    @elseif(Request::is('procurement', 'procurement/*','asset','asset/*','assethandover','assethandover/*'))
                        Asset
                    @elseif(Request::is('purchaserequest', 'purchaserequest/*','itempurchase', 'itempurchase/*'))
                        Asset
                    @elseif(Request::is( 'disposalrequest','disposalrequest/*','disposal','disposal/*'))
                        Asset
                    @endif
                </li>
                </ol>
                <h6 class="font-weight-bolder mb-0">
                    @if(Request::is('pegawai', 'pegawai/*'))
                        Staff
                    @elseif(Request::is('branch','branch/*'))
                        Branch
                    @elseif(Request::is('bagian', 'bagian/*'))
                        Division
                    @elseif(Request::is('home'))
                        Dashboard
                    @elseif(Request::is('assetmodel','assetmodel/*'))
                        Asset Model
                    @elseif(Request::is('assetrequest','assetrequest/*','itemrequest','itemrequest/*'))
                        Asset Request
                    @elseif(Request::is('assetapproval', 'assetapproval/*'))
                        Asset Procurement
                    @elseif(Request::is('purchaserequest', 'purchaserequest/*'))
                        Request Procurement
                    @elseif(Request::is('itempurchase', 'itempurchase/*'))
                        Approval Procurement
                    @elseif(Request::is('procurement', 'procurement/*'))
                        Procurement
                    @elseif(Request::is('asset','asset/*'))
                        Asset
                    @elseif(Request::is( 'disposalrequest','disposalrequest/*'))
                       Disposal Request
                    @elseif(Request::is( 'disposal','disposal/*'))
                       Disposal
                    @elseif(Request::is('assethandover','assethandover/*'))
                        Handover
                    @elseif(Request::is('vendor', 'vendor/*'))
                        Vendor
                    @elseif(Request::is('contract', 'contract/*'))
                        Contract
                    @endif
                </h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    {{-- <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span> --}}
                    {{-- <input type="text" class="form-control" placeholder="Type here..."> --}}
                </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    {{-- <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard">Online Builder</a> --}}
                </li>
                @guest
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('login') }}" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa fa-bell me-sm-1"></i>
                        <span class="d-sm-inline d-none">Sign In</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link font-weight-bold text-body px-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                        <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="{{ route('assethandover.show',Auth::user()->id) }}">
                            <div class="d-flex py-1">
                                <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <span class="font-weight-bold">My Profile</span>
                                </h6>
                                </div>
                            </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <div class="d-flex py-1">
                                <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <span class="font-weight-bold">Log Out</span>
                                </h6>
                                </div>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </a>
                        </li>
                        </ul>
                    </li>
                @endguest
                </ul>
            </div>
            </div>
        </nav>
      <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-12">
                <div class="card">
                @yield('content')
                </div>
            </div>
        </div>
    </main>
    <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  {{-- <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script> --}}
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('../assets/js/soft-ui-dashboard.min.js?v=1.0.5') }}"></script>
</body>

</html>