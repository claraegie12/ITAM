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
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                    My Asset List
                </li>
                </ol>
                <h6 class="font-weight-bolder mb-0">
                    ITAM
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
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <h4>My Asset</h4>
                               
                                {{-- <p class="text-ml mb-0">
                                    <span class="font-weight-bold ms-1">Request Name</span> : {{ $AssetRequest->name }}
                                </p>
                                <p class="text-ml mb-0">
                                    <span class="font-weight-bold ms-1">Request Description</span> : {{ $AssetRequest->Description }}
                                </p>
                                <p class="text-ml mb-0">
                                    <span class="font-weight-bold ms-1">Request Date</span> : {{ $AssetRequest->Request_date }}
                                </p>
                                <p class="text-ml mb-0">
                                    <span class="font-weight-bold ms-1">Request By</span> : {{ $AssetRequest->Created_by }}
                                </p> --}}
                            </div>
                        </div>
                           
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Model</th>
                                            <th class="text-center">Handover By</th>
                                            <th colspan=2 class="text-center">Action</th>
                                        </tr>
                                        </thead>    
                                        <tbody>
                                        @foreach ($Handovers as $Item)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td >{{ $Item->Asset->AssetModel->Model_category }} - {{ $Item->Asset->AssetModel->Model_name }}</td>
                                                <td class="text-center">{{ $Item->Handover_by }}</td>
                                                @if ($Item->handover_approval == "0")
                                                <td>
                                                    <form action="{{ route('assethandover.update',$Item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT') 
                                                            <input type="hidden" value = "1" name="handover_approval"/>
                                                            <input type="hidden" value = "0" name="flag"/>
                                                            <input type="hidden" value = "{{$Item->Pegawai_id}}" name="Pegawai_id"/>
                                                            <input type="hidden" value = "0" name="return_approval"/>
                                                            <input type="hidden" value = "{{$Item->Asset_id}}" name="Asset_id"/>
                                                            <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to approve this data?')">Approve</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('assethandover.update',$Item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT') 
                                                            <input type="hidden" value = "2" name="handover_approval"/>
                                                            <input type="hidden" value = "0" name="flag"/>
                                                            <input type="hidden" value = "{{$Item->Pegawai_id}}" name="Pegawai_id"/>
                                                            <input type="hidden" value = "0" name="return_approval"/>
                                                            <input type="hidden" value = "{{$Item->Asset_id}}" name="Asset_id"/>
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to reject this data?')">Reject</button>
                                                    </form>
                                                </td>
                                                @elseif ($Item->handover_approval == "1" && $Item->flag == "0")
                                                <td  class="text-center" colspan=2>
                                                    <form action="{{ route('assethandover.update',$Item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT') 
                                                            <input type="hidden" value = "1" name="handover_approval"/>
                                                            <input type="hidden" value = "1" name="flag"/>
                                                            <input type="hidden" value = "{{$Item->Pegawai_id}}" name="Pegawai_id"/>
                                                            <input type="hidden" value = "0" name="return_approval"/>
                                                            <input type="hidden" value = "{{$Item->Asset_id}}" name="Asset_id"/>
                                                            <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure to return this asset?')">Return</button>
                                                    </form>
                                                </td>
                                                @elseif ($Item->return_approval == "1" && $Item->flag == "1")
                                                <td  class="text-center" colspan=2>Return to {{$Item->return_to}}</td>
                                                @endif
                                                
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
    </main>
    <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
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