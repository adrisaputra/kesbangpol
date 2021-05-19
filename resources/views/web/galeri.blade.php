@extends('web/layout')
@section('content')
       
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container" style="width: 70%;">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{ $title }}</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>{{ $title }}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2><strong>Galeri Foto</strong></h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

          @foreach($foto as $v)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ asset('upload/foto/'.$v->gambar)}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{ $v->judul }}</h4>
              <a href="{{ asset('upload/foto/'.$v->gambar)}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" ><i class="bx bx-plus"></i></a>
            </div>
          </div>
          @endforeach

        </div>

        <div align="right" style="float: right;">{{ $foto->appends(Request::only('search'))->links() }}</div>
      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

@endsection