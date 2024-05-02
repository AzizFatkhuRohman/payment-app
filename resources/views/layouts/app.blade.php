<!DOCTYPE html>
<html lang="en">

<head>
    <title>AKTI | {{$title}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Qubes Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Qubes admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/animate-css/vivify.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendor/c3/c3.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/site.min.css')}}">

    <!-- Datatable -->
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/sweetalert/sweetalert.css')}}" />

    <!-- input text -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/multi-select/css/multi-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/nouislider/nouislider.min.css')}}">
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js
"></script>
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css
" rel="stylesheet">
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><i class="fa fa-cube font-25"></i></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <div id="wrapper">
        <!-- navbar -->
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-left">
                    <div class="navbar-brand">
                        <a class="small_menu_btn" href="javascript:void(0);"><i class="fa fa-align-left"></i></a>
                        <a href="#"><span>AKTI</span></a>
                    </div>
                    {{-- <form id="navbar-search" class="navbar-form search-form">
                        <input value="" class="form-control" placeholder="Search here..." type="text" />
                        <button type="button" class="btn btn-default">
                            <i class="icon-magnifier"></i>
                        </button>
                    </form> --}}
                </div>

                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <form action="{{url('logout')}}" method="post" id="logout">
                                    @csrf
                                    <button class="btn btn-danger" onclick="onlickP()" type="button"><i
                                            class="fa fa-power-off"></i></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- sidebar -->
        <div id="left-sidebar" class="sidebar">
            {{-- <div class="sidebar_icon">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link" href="page-search-results.html"><i
                                class="fa fa-search"></i></a></li>
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Home-icon"><i
                                class="fa fa-dashboard"></i></a></li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('logout')}}"><i class="fa fa-power-off"></i></a>
                        <!-- <a class="nav-link" data-toggle="tab" href="#Setting-icon"><i class="fa fa-cog"></i></a> -->
                    </li>
                </ul>
            </div> --}}
            <div class="sidebar_list">
                <div class="tab-content" id="main-menu">
                    <div class="tab-pane active" id="Home-icon">
                        <nav class="sidebar-nav sidebar-scroll">
                            @if (Auth::user()->role == 'admin')
                            <ul class="metismenu">
                                <li class="active"><a href="{{url('/')}}"><i
                                            class="icon-speedometer"></i><span>Dashboard</span></a></li>

                                <li class="header">
                                    {{Auth::user()->nama}}
                                </li>
                                <li>
                                    <a href="{{url('data-bank')}}"><i class="icon-home"></i>Bank</a>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow"><i class="icon-user"></i>Karyawan</a>
                                    <ul>
                                        <li><a href="{{url('data-karyawan')}}">Data Karyawan</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('periode')}}"><i class="icon-calendar"></i>Periode</a>
                                </li>
                                <li>
                                    <a href="#" class="has-arrow"><i class="icon-printer"></i>Payslip</a>
                                    <ul>
                                        <li><a href="{{url('payslip/salary')}}">Input Gaji</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#Pages" class="has-arrow"><i class="icon-lock"></i><span>Peb</span></a>
                                    <ul>
                                        <li><a href="{{url('peb/vendor')}}">Vendor</a></li>
                                        <li><a href="{{url('peb/vendor/payment-date')}}">Tanggal
                                                Transaksi</a></li>
                                        <li><a href="{{url('peb/vendor/data-transaksi')}}">Transaksi</a>
                                        </li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow"><i class="icon-wrench"></i>Setting</a>
                                    <ul>
                                        <li><a href="{{url('setting/role')}}"><i class="icon-user"></i>Role</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="{{url('change-password/')}}"><i class="icon-user"></i>Ubah
                                        Password</a>
                                </li>
                            </ul>
                            @else
                            <ul class="metismenu">
                                <li class="active"><a href="{{url('/')}}"><i
                                            class="icon-speedometer"></i><span>Dashboard</span></a></li>

                                <li class="header">
                                    {{Auth::user()->nama}}
                                </li>

                                <li>
                                    <a href="#Pages" class="has-arrow"><i class="icon-lock"></i><span>Peb</span></a>
                                    <ul>
                                        <li><a href="{{url('peb/vendor')}}">Vendor</a></li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="{{url('change-password/')}}"><i class="icon-user"></i>Ubah
                                        Password</a>
                                </li>
                            </ul>
                            @endif
                        </nav>
                    </div>


                </div>
            </div>
        </div>

        <div id="main-content">
            @yield('main')
        </div>
    </div>
    <script src="{{asset('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>

    <!-- Bootstrap 4x JS  -->
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>

    <script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/flotscripts.bundle.js')}}"></script><!-- flot charts Plugin Js -->
    <script src="{{asset('assets/bundles/knob.bundle.js')}}"></script>

    <!-- Project Common JS -->
    <script src="{{asset('/assets/js/common.js')}}"></script>
    <script src="{{asset('assets/js/index.js')}}"></script>

    <script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="{{asset('assets/js/common.js')}}"></script>
    <script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>

    <!-- Input type -->
    <script src="{{asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
    <!-- Bootstrap Colorpicker Js -->
    <script src="{{asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
    <!-- Input Mask Plugin Js -->
    <script src="{{asset('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script>
    <!-- Multi Select Plugin Js -->
    <script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{asset('assets/vendor/nouislider/nouislider.js')}}"></script><!-- noUISlider Plugin Js -->
    <script src="{{asset('assets/js/common.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
    <script>
        function onlickP() {
          Swal.fire({
              title: 'Konfirmasi',
              text: 'Apakah Anda yakin ingin menghapus ini?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus!',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.isConfirmed) {
                  document.getElementById('logout').submit();
              }
          });
          
      }
    </script>
</body>

</html>