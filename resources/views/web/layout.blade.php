<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ __('SISTEM INFORMASI PELAYANAN KESBANGPOL KOTA KENDARI')}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('upload/logo/kendari.png')}}" rel="icon">
  <link href="{{ asset('assets2/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets2/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets2/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link href="https://fonts.googleapis.com/css?family=Anton|Permanent+Marker|Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400&display=swap" rel="stylesheet"> 
        

  <!-- =======================================================
  * Template Name: Flattern - v4.1.0
  * Template URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between" style="width: 70%;">

      <div class="logo">
        <!-- <h1 class="text-light"><a href="index.html">Flattern</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html"><img src="{{ asset('upload/logo/logo_kesbangpol.png')}}" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="{{ url('/') }}">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Buat Pengajuan</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                @if(Auth::user())
                  <li><a href="{{ url('pengajuan_izin_penelitian_w') }}">Izin Penelitian</a></li>
                  <li><a href="{{ url('pengajuan_skk_ormas_w') }}">Surat Keterangan Keberadaan Ormas</a></li>
                  <li><a href="{{ url('pengajuan_skt_ormas_w') }}">Surat Keterangan Terdaftar Ormas</a></li>
                @else
                  <li><a href="{{ url('login_w') }}">Izin Penelitian</a></li>
                  <li><a href="{{ url('login_w') }}">Surat Keterangan Keberadaan Ormas</a></li>
                  <li><a href="{{ url('login_w') }}">Surat Keterangan Terdaftar Ormas</a></li>
                @endif
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Status Dokumen</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                @if(Auth::user())
                  <li><a href="{{ url('status_izin_penelitian_w') }}">Izin Penelitian</a></li>
                  <li><a href="{{ url('status_skk_ormas_w') }}">Surat Keterangan Keberadaan Ormas</a></li>
                  <li><a href="{{ url('status_skt_ormas_w') }}">Surat Keterangan Terdaftar Ormas</a></li>
                @else
                  <li><a href="{{ url('login_w') }}">Izin Penelitian</a></li>
                  <li><a href="{{ url('login_w') }}">Surat Keterangan Keberadaan Ormas</a></li>
                  <li><a href="{{ url('login_w') }}">Surat Keterangan Terdaftar Ormas</a></li>
                @endif
                </ul>
              </li>
              @if(Auth::user())
                <li><a href="{{ url('pengaduan_w') }}">Pengaduan</a></li>
              @else
              <li><a href="{{ url('login_w') }}">Pengaduan</a></li>
              @endif
              
            </ul>
          </li>
          <li><a href="{{ url('galeri_w') }}">Galeri</a></li>
          @if(Auth::user())
            @if(Auth::user()->foto_ktp)
              <li class="dropdown"><img src="{{ asset('upload/foto_ktp/'.Auth::user()->foto_ktp)}}" width=40px height="40px" style="border-radius: 50%;margin-left:20px"></a>
                <ul>
                    <li><a href="{{ url('akun_w') }}">Akun</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form></li>
                </ul>
              </li>
            @else
              <li class="dropdown"><img src="{{ asset('assets/profile-1-20210205190338.png')}}" width=40px height="40px" style="border-radius: 50%;margin-left:20px"></a>
                <ul>
                    <li><a href="{{ url('akun_w') }}">Akun</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form></li>
                </ul>
              </li>
            @endif
          @else
            <li><a href="{{ url('login_w') }}">Login</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-12 col-md-12 footer-contact">
            <h3>{{ $profil[0]->nama_dinas }}</h3>
            <p>
              {{ $profil[0]->alamat }} <br>
              <strong>Telepon:</strong>{{ $profil[0]->telp }}<br>
              <strong>Email:</strong> {{ $profil[0]->email }}<br>
            </p>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <!-- <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Flattern</span></strong>. All Rights Reserved
        </div>
        <div class="credits"> -->
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/ -->
          <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div> -->
      <!-- <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div> -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets2/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets2/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets2/js/main.js') }}"></script>

</body>

</html>