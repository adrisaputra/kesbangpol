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
          <h2><strong>Berita</strong></h2>
      </div>

      @foreach($berita as $v)
        <div class="row">
              <div class="col-lg-5" data-aos="fade-up">
                <img src="{{ asset('upload/berita/'.$v->foto) }}" width="450px" height="300px" alt="" style="height: 260px;">
              </div>  
              <div class="col-lg-7">
              <h3 data-aos="fade-up">{{ $v->judul }}</h3>
                <!--div class="blog-meta">
                  <span class="comments-type">
                    <i class="fa fa-comment-o"></i>
                    <a href="#">13 comments</a>
                  </span>
                  <span class="date-type">
                    <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                  </span>
                </div-->
                <div class="blog-text" data-aos="fade-up">
                  <p data-aos="fade-up"> 
                  <?php
                $content = substr($v->isi, 0, 400);
              ?>
              {!! $content !!} ...
                  </p>
                </div>
                <a href="{{ url('detail_berita_w/'.$v->id ) }}" 
                    style="display: inline-block;
                    background: #28a745;
                    color: #fff;
                    padding: 4px 10px;
                    font-size: 12px;
                    border-radius: 4px;" data-aos="fade-up">Read More</a>
                </div>
        </div><br><br>
      @endforeach
        <div class="text-center" data-aos="fade-up">
          <a href="{{ url('berita_w')}}" class="btn btn-warning" style="padding: 9px 24px;">Lihat Semua Berita</a>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

@endsection