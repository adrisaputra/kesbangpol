<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>{{ __('SISTEM INFORMASI PELAYANAN KESBANGPOL KOTA KENDARI')}}</title>
        <link href="{{ asset('/upload/logo/kendari.png') }}" rel="icon">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/Ionicons/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap-daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-plugin/iCheck/all.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-plugin/timepicker/bootstrap-timepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-dist/css/skins/_all-skins.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link href="https://fonts.googleapis.com/css?family=Anton|Permanent+Marker|Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400&display=swap" rel="stylesheet"> 
        <style type="text/css">
            .fontQuicksand{
                font-family: 'Quicksand', sans-serif;
            }

            .fontPoppins{
                font-family: 'Poppins', sans-serif;
            }

            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background-color: #fff;
            }

            .preloader .loading {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
                font: 14px arial;
            }

            .dropzone {
                border: 2px dashed #0087F7;
            }
        </style>
        
        
        <script>
			
			function formatRupiah(objek, separator) {
                  a = objek.value;
                  b = a.replace(/[^\d]/g,"");
                  c = "";
                  panjang = b.length;
                  j = 0;
                  for (i = panjang; i > 0; i--) {
                    j = j + 1;
                    if (((j % 3) == 1) && (j != 1)) {
                      c = b.substr(i-1,1) + separator + c;
                    } else {
                      c = b.substr(i-1,1) + c;
                    }
                  }
                  objek.value = c;
            }
                
        </script>

    </head>

    <body class="default sidebar-mini skin-red fontPoppins">
        <div class="preloader">
			<div class="loading text-center">
				<img src="{{ asset('/assets/core-images/load.gif') }}" width="50">
                <br>
				<p><b class="fontPoppins">Harap Tunggu</b></p>
			</div>
		</div>
        <div class="wrapper">
            <header class="main-header">
                <a href="" class="logo">
                    <span class="logo-mini"><b>SIM</b></span>
                    <span class="logo-lg"><b>SIMKES</b></span>
                </a>
                
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('assets/profile-1-20210205190338.png') }}" class="user-image" alt="User Image">                                
						  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="{{ asset('assets/profile-1-20210205190338.png') }}" class="img-circle" alt="User Image">                                        
								<p>
                                    {{ Auth::user()->name }}                                            
								    <small>Member since<br> {{ Auth::user()->created_at }} </small>
                                        </p>
                                    </li>
                                    
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{{ url('/password') }}" class="btn btn-default btn-flat">Ganti Password</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ url('logout-sistem') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-google btn-flat">Sign out</a>
									<form id="logout-form" action="{{ url('logout-sistem') }}" method="POST" style="display: none;">
											@csrf
									</form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('assets/profile-1-20210205190338.png') }}" class="img-circle" alt="User Image">                        
					</div>
                        <div class="pull-left info">
                            <p>{{ Auth::user()->name }}  </p>                            
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="{{ (request()->is('dashboard*')) ? 'active' : '' }}"><a href="{{ url('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li class="treeview  {{ (request()->is('izin_penelitian_masuk*','izin_penelitian_di_proses*','izin_penelitian_di_verifikasi*','izin_penelitian_selesai*','izin_penelitian_masuk*','izin_penelitian_di_verifikasi*')) ? 'active' : '' }}">
                            <a href="#"> <i class="fa fa-database"></i> <span>Izin Penelitian</span>
                                <span class="pull-right-container" id="notif">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                            @if(Auth::user()->group==1 || Auth::user()->group==2)
                                <li class="{{ (request()->is('izin_penelitian_masuk*')) ? 'active' : '' }}"><a href="{{ url('izin_penelitian_masuk')}}"><i class="fa fa-circle-o"></i> Data Masuk
                                <span class="pull-right-container" id="notif2">
                                </span></a></li>
                                <li class="{{ (request()->is('izin_penelitian_di_proses*')) ? 'active' : '' }}"><a href="{{ url('izin_penelitian_di_proses')}}"><i class="fa fa-circle-o"></i> Data Di Proses</a></li>
                                <li class="{{ (request()->is('izin_penelitian_di_verifikasi*')) ? 'active' : '' }}"><a href="{{ url('izin_penelitian_di_verifikasi')}}"><i class="fa fa-circle-o"></i> Telah Di Verifikasi
                                <span class="pull-right-container" id="notif3">
                                </span></a></li>
                                <li class="{{ (request()->is('izin_penelitian_selesai*')) ? 'active' : '' }}"><a href="{{ url('izin_penelitian_selesai')}}"><i class="fa fa-circle-o"></i> Selesai</a></li>
                            @else
                                <li class="{{ (request()->is('izin_penelitian_masuk*')) ? 'active' : '' }}"><a href="{{ url('izin_penelitian_masuk')}}"><i class="fa fa-circle-o"></i> Data Masuk
                                <span class="pull-right-container" id="notif2">
                                </span></a></li>
                                <li class="{{ (request()->is('izin_penelitian_di_verifikasi*')) ? 'active' : '' }}"><a href="{{ url('izin_penelitian_di_verifikasi')}}"><i class="fa fa-circle-o"></i> Telah Di Verifikasi</a></li>
                            @endif
                            </ul>
                        </li>  
                        <li class="treeview  {{ (request()->is('skk_ormas_masuk*','skk_ormas_di_proses*','skk_ormas_di_verifikasi*','skk_ormas_selesai*','skk_ormas_masuk*','skk_ormas_di_verifikasi*')) ? 'active' : '' }}">
                            <a href="#"> <i class="fa fa-database"></i> <span>SKK Ormas</span>
                                <span class="pull-right-container" id="notif4">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                            @if(Auth::user()->group==1 || Auth::user()->group==2)
                                <li class="{{ (request()->is('skk_ormas_masuk*')) ? 'active' : '' }}"><a href="{{ url('skk_ormas_masuk')}}"><i class="fa fa-circle-o"></i> Data Masuk
                                <span class="pull-right-container" id="notif5">
                                </span></a></li>
                                <li class="{{ (request()->is('skk_ormas_di_proses*')) ? 'active' : '' }}"><a href="{{ url('skk_ormas_di_proses')}}"><i class="fa fa-circle-o"></i> Data Di Proses</a></li>
                                <li class="{{ (request()->is('skk_ormas_di_verifikasi*')) ? 'active' : '' }}"><a href="{{ url('skk_ormas_di_verifikasi')}}"><i class="fa fa-circle-o"></i> Telah Di Verifikasi
                                <span class="pull-right-container" id="notif6">
                                </span></a></li>
                                <li class="{{ (request()->is('skk_ormas_selesai*')) ? 'active' : '' }}"><a href="{{ url('skk_ormas_selesai')}}"><i class="fa fa-circle-o"></i> Selesai</a></li>
                            @else
                                <li class="{{ (request()->is('skk_ormas_masuk*')) ? 'active' : '' }}"><a href="{{ url('skk_ormas_masuk')}}"><i class="fa fa-circle-o"></i> Data Masuk
                                <span class="pull-right-container" id="notif5">
                                </span></a></li>
                                <li class="{{ (request()->is('skk_ormas_di_verifikasi*')) ? 'active' : '' }}"><a href="{{ url('skk_ormas_di_verifikasi')}}"><i class="fa fa-circle-o"></i> Telah Di Verifikasi</a></li>
                            @endif
                            </ul>
                        </li>  
                        <li class="treeview  {{ (request()->is('skt_ormas_masuk*','skt_ormas_di_proses*','skt_ormas_di_verifikasi*','skt_ormas_selesai*','skt_ormas_masuk*','skt_ormas_di_verifikasi*')) ? 'active' : '' }}">
                            <a href="#"> <i class="fa fa-database"></i> <span>SKT Ormas</span>
                                <span class="pull-right-container" id="notif7">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                            @if(Auth::user()->group==1 || Auth::user()->group==2)
                                <li class="{{ (request()->is('skt_ormas_masuk*')) ? 'active' : '' }}"><a href="{{ url('skt_ormas_masuk')}}"><i class="fa fa-circle-o"></i> Data Masuk
                                <span class="pull-right-container" id="notif8">
                                </span></a></li>
                                <li class="{{ (request()->is('skt_ormas_di_proses*')) ? 'active' : '' }}"><a href="{{ url('skt_ormas_di_proses')}}"><i class="fa fa-circle-o"></i> Data Di Proses</a></li>
                                <li class="{{ (request()->is('skt_ormas_di_verifikasi*')) ? 'active' : '' }}"><a href="{{ url('skt_ormas_di_verifikasi')}}"><i class="fa fa-circle-o"></i> Telah Di Verifikasi
                                <span class="pull-right-container" id="notif9">
                                </span></a></li>
                                <li class="{{ (request()->is('skt_ormas_selesai*')) ? 'active' : '' }}"><a href="{{ url('skt_ormas_selesai')}}"><i class="fa fa-circle-o"></i> Selesai</a></li>
                            @else
                                <li class="{{ (request()->is('skt_ormas_masuk*')) ? 'active' : '' }}"><a href="{{ url('skt_ormas_masuk')}}"><i class="fa fa-circle-o"></i> Data Masuk
                                <span class="pull-right-container" id="notif8">
                                </span></a></li>
                                <li class="{{ (request()->is('skt_ormas_di_verifikasi*')) ? 'active' : '' }}"><a href="{{ url('skt_ormas_di_verifikasi')}}"><i class="fa fa-circle-o"></i> Telah Di Verifikasi</a></li>
                            @endif
                            </ul>
                        </li>
                        <li class="{{ (request()->is('pengaduan*')) ? 'active' : '' }}""><a href="{{ url('pengaduan')}}"><i class="fa fa-database"></i> <span>Pengaduan</span></a></li>
                        <li class="{{ (request()->is('foto*')) ? 'active' : '' }}""><a href="{{ url('foto')}}"><i class="fa fa-database"></i> <span>Foto</span></a></li>
                        @if(Auth::user()->group==1)
                        <li class="header">PENGATURAN</li>
                        <li class="{{ (request()->is('slider*')) ? 'active' : '' }}""><a href="{{ url('slider')}}"><i class="fa fa-user"></i> <span>Slider</span></a></li>
                        <li class="{{ (request()->is('user*')) ? 'active' : '' }}""><a href="{{ url('user')}}"><i class="fa fa-user"></i> <span>User</span></a></li>
                        @endif

                        
                    </ul>
                </section>
            </aside><!-- Styles -->

		  @yield('konten')

		             
		  <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 0.0.1
                </div>
               
            </footer>
            
        </div>
       
        <script src="{{ asset('/assets/core-admin/core-component/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-plugin/timepicker/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-plugin/iCheck/icheck.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/fastclick/lib/fastclick.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-dist/js/demo.js') }}"></script>
        
        <script type="text/javascript">
            function cek(){
                
                $.ajax({
                    url:"{{ url('/izin_penelitian/total_data_masuk') }}",
                    cache: false,
                    success: function(msg){
                        $("#notif").html(msg);
                    }
                });
                // var waktu = setTimeout("cek4()",3000);
            }

            $(document).ready(function(){
                cek();
                
            });

            function cek2(){
                
                $.ajax({
                    url:"{{ url('/izin_penelitian/jumlah_data_masuk') }}",
                    cache: false,
                    success: function(msg){
                        $("#notif2").html(msg);
                    }
                });
                // var waktu = setTimeout("cek4()",3000);
            }

            $(document).ready(function(){
                cek2();
                
            });

            function cek3(){
                
                $.ajax({
                    url:"{{ url('/izin_penelitian/jumlah_data_diverifikasi') }}",
                    cache: false,
                    success: function(msg){
                        $("#notif3").html(msg);
                    }
                });
                // var waktu = setTimeout("cek4()",3000);
            }

            $(document).ready(function(){
                cek3();
                
            });

            function cek4(){
                
                $.ajax({
                    url:"{{ url('/skk_ormas/total_data_masuk') }}",
                    cache: false,
                    success: function(msg){
                        $("#notif4").html(msg);
                    }
                });
                // var waktu = setTimeout("cek4()",3000);
            }

            $(document).ready(function(){
                cek4();
                
            });

            function cek5(){
                
                $.ajax({
                    url:"{{ url('/skk_ormas/jumlah_data_masuk') }}",
                    cache: false,
                    success: function(msg){
                        $("#notif5").html(msg);
                    }
                });
                // var waktu = setTimeout("cek4()",3000);
            }

            $(document).ready(function(){
                cek5();
                
            });

            function cek6(){
                
                $.ajax({
                    url:"{{ url('/skk_ormas/jumlah_data_diverifikasi') }}",
                    cache: false,
                    success: function(msg){
                        $("#notif6").html(msg);
                    }
                });
                // var waktu = setTimeout("cek4()",3000);
            }

            $(document).ready(function(){
                cek6();
                
            });

            function cek7(){
                
                $.ajax({
                    url:"{{ url('/skt_ormas/total_data_masuk') }}",
                    cache: false,
                    success: function(msg){
                        $("#notif7").html(msg);
                    }
                });
                // var waktu = setTimeout("cek4()",3000);
            }

            $(document).ready(function(){
                cek7();
                
            });

            function cek8(){
                
                $.ajax({
                    url:"{{ url('/skt_ormas/jumlah_data_masuk') }}",
                    cache: false,
                    success: function(msg){
                        $("#notif8").html(msg);
                    }
                });
                // var waktu = setTimeout("cek4()",3000);
            }

            $(document).ready(function(){
                cek8();
                
            });

            function cek9(){
                
                $.ajax({
                    url:"{{ url('/skt_ormas/jumlah_data_diverifikasi') }}",
                    cache: false,
                    success: function(msg){
                        $("#notif9").html(msg);
                    }
                });
                // var waktu = setTimeout("cek4()",3000);
            }

            $(document).ready(function(){
                cek9();
                
            });

        </script>
        <script>
            $(document).ready(function () {
              $('.sidebar-menu').tree();
              $('.preloader').fadeOut();

              $("#rowpage").change(function(){
					var row = $("#rowpage").val();
					$.ajax({
						type      : "POST",
						url       : "{{ asset('/admin/setting/setRows",
						data      : {row: row},
						success   : function(msg){
							location.reload();
						}
					});
				});


                //Select2
                $('.select2').select2();

                //Date picker
                $('.datepicker').datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd'
                })

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass   : 'iradio_minimal-blue'
                });

                //Colorpicker
                $('.colorpicker').colorpicker();

                //Timepicker
                $('.timepicker').timepicker({
                    showInputs: true
                });

                //Date range picker
                $('.reservation').daterangepicker();

            })
        </script>
        
    </body>
</html>