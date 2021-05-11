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
            
            <form action="{{ url('/buat_pengajuan_izin_penelitian_w')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Surat Dari Perguruan Tinggi/Instansi Asal Peneliti</p>
                </div>
                <div class="col-md-7 form-group">
                  <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png,pdf)</i><br>
                  <input type="file" name="surat_perguruan_tinggi" class="form-control">
                  @if ($errors->has('surat_perguruan_tinggi')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('surat_perguruan_tinggi') }}</label>@endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Proposal Penelitian</p>
                </div>
                <div class="col-md-7 form-group">
                  <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png,pdf)</i><br>
                  <input type="file" name="proposal_penelitian" class="form-control">
                  @if ($errors->has('proposal_penelitian')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('proposal_penelitian') }}</label>@endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Foto Copy KTP Peneliti</p>
                </div>
                <div class="col-md-7 form-group">
                  <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png,pdf)</i><br>
                  <input type="file" name="ktp_peneliti" class="form-control">
                  @if ($errors->has('ktp_peneliti')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('ktp_peneliti') }}</label>@endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Formulir Permohonan Izin Penelitian</p>
                </div>
                <div class="col-md-7 form-group">
                  <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png,pdf)</i><br>
                  <input type="file" name="izin_penelitian" class="form-control">
                  @if ($errors->has('izin_penelitian')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('izin_penelitian') }}</label>@endif
                </div>
              </div>
              <br>
              <div class="text-center"><button type="submit" class="btn btn-success" style="background: #d41e10;
    border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 4px;">Kirim Permohonan</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection