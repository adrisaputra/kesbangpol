@extends('web/layout')
@section('content')
       
 
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">


        @foreach( $slider as $v )
					<li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->iteration }}"  ></li>
          <!-- Slide 1 -->
          <div class="carousel-item @if($loop->iteration==1) active @endif" " style="background-image: url({{ asset('upload/slider/'.$v->gambar)}});">
            <div class="carousel-container">
              <div class="carousel-content animate__animated animate__fadeInUp">
                <h2><span>{{ $v->judul }}</span></h2>
                <p>{{ $v->isi }}</p>
                <!-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> -->
              </div>
            </div>
          </div>
        @endforeach

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

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

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

@endsection