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
            
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:5px">Kode Pengajuan</p>
                </div>
                <div class="col-md-7 form-group">
                  <input type="text" name="surat_perguruan_tinggi" class="form-control" value="{{ $izin_penelitian->kode }}" disabled>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Surat Dari Perguruan Tinggi/Instansi Asal Peneliti</p>
                </div>
                <div class="col-md-7 form-group">
                    <a href="{{ asset('/upload/surat_perguruan_tinggi/'.$izin_penelitian->surat_perguruan_tinggi) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Proposal Penelitian</p>
                </div>
                <div class="col-md-7 form-group">
                    <a href="{{ asset('/upload/proposal_penelitian/'.$izin_penelitian->proposal_penelitian) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Foto Copy KTP Peneliti</p>
                </div>
                <div class="col-md-7 form-group">
                    <a href="{{ asset('/upload/ktp_peneliti/'.$izin_penelitian->ktp_peneliti) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Formulir Permohonan Izin Penelitian</p>
                </div>
                <div class="col-md-7 form-group">
                    <a href="{{ asset('/upload/izin_penelitian/'.$izin_penelitian->izin_penelitian) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>
              <br>
              
              <div class="text-center">
                <a href="{{ url('status_izin_penelitian_w')}}" class="btn btn-warning" style="padding: 9px 24px;">Kembali</a>
              </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection