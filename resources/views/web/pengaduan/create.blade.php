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

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" >
        <center><h2>{{ $title }}</h2></center>
        
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            
            <form action="{{ url('/pengaduan_w')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p>Tentang</p>
                </div>
                <div class="col-md-7 form-group">
                  <input type="text" name="subjek" class="form-control">
                  @if ($errors->has('subjek')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('subjek') }}</label>@endif
                </div>
              </div>

              <div class="row" style="margin-top:10px">
                <div class="col-md-5 form-group">
                  <p>Masukkan Detail Aduan</p>
                </div>
                <div class="col-md-7 form-group">
                  <textarea name="pesan" class="form-control"></textarea>
                  @if ($errors->has('pesan')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('pesan') }}</label>@endif
                </div>
              </div>
              
              <div class="row" style="margin-top:10px">
                <div class="col-md-5 form-group">
                  <p>Captcha :</p>
                </div>
                <div class="col-md-2 form-group">
                  <?=captcha_img();?>
                </div>
                <div class="col-md-4 form-group">
                    <input type="text" class="form-control" name="captcha" placeholder="Masukkan Captcha" >
                    @if ($errors->has('captcha')) <div class="validate" style="display:block;color: red;margin: 0 0 15px 0;font-weight: 400;font-size: 13px;"> {{ $errors->first('captcha') }}</div>@endif  
                </div>
              </div>
              
              <br>
              <div class="text-center"><button type="submit" class="btn btn-success" style="background: #d41e10;
    border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 4px;">Kirim Pengaduan</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection