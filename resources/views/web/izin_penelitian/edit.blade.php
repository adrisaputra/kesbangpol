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


            <form action="{{ url('/pengajuan_izin_penelitian_w/edit/'.$izin_penelitian->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Surat Dari Perguruan Tinggi/Instansi Asal Peneliti</p>
                </div>
                
                @if($izin_penelitian->surat_perguruan_tinggi)
                  <div class="col-md-7 form-group">
                      <a href="{{ asset('/upload/surat_perguruan_tinggi/'.$izin_penelitian->surat_perguruan_tinggi) }}" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                @else
                  <div class="col-md-4 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png,pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="1">
                    <input type="file" name="surat_perguruan_tinggi" class="form-control">
                    @if ($errors->has('surat_perguruan_tinggi')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('surat_perguruan_tinggi') }}</label>@endif
                  </div>
                  <div class="col-md-3 form-group">
                      <a href="{{ asset('/upload/surat_perguruan_tinggi/'.$izin_penelitian->surat_perguruan_tinggi) }}" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat<i class="icofont-download"></i></a>
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>
                @endif

              </div>

            </form>

            <form action="{{ url('/pengajuan_izin_penelitian_w/edit/'.$izin_penelitian->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Proposal Penelitian</p>
                </div>
                
                @if($izin_penelitian->proposal_penelitian)
                  <div class="col-md-7 form-group">
                      <a href="{{ asset('/upload/proposal_penelitian/'.$izin_penelitian->proposal_penelitian) }}" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                @else
                  <div class="col-md-4 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png,pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="2">
                    <input type="file" name="proposal_penelitian" class="form-control">
                    @if ($errors->has('proposal_penelitian')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('proposal_penelitian') }}</label>@endif
                  </div>
                  <div class="col-md-3 form-group">
                    <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>
                @endif

              </div>

            </form>

            <form action="{{ url('/pengajuan_izin_penelitian_w/edit/'.$izin_penelitian->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Foto Copy KTP Peneliti</p>
                </div>

                @if($izin_penelitian->ktp_peneliti)
                  <div class="col-md-7 form-group">
                      <a href="{{ asset('/upload/ktp_peneliti/'.$izin_penelitian->ktp_peneliti) }}" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                @else
                  <div class="col-md-4 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png,pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="3">
                    <input type="file" name="ktp_peneliti" class="form-control">
                    @if ($errors->has('ktp_peneliti')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('ktp_peneliti') }}</label>@endif
                  </div>
                  <div class="col-md-3 form-group">
                    <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>
                @endif

              </div>

            </form>

            <form action="{{ url('/pengajuan_izin_penelitian_w/edit/'.$izin_penelitian->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">Formulir Permohonan Izin Penelitian</p>
                </div>

                @if($izin_penelitian->izin_penelitian)
                  <div class="col-md-7 form-group">
                      <a href="{{ asset('/upload/izin_penelitian/'.$izin_penelitian->izin_penelitian) }}" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                @else
                  <div class="col-md-4 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png,pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="4">
                    <input type="file" name="izin_penelitian" class="form-control">
                    @if ($errors->has('izin_penelitian')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('izin_penelitian') }}</label>@endif
                  </div>
                  <div class="col-md-3 form-group">
                    <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>
                @endif
              </div>

              </form>
              <br>
              
            <form action="{{ url('/pengajuan_izin_penelitian_w/edit/'.$izin_penelitian->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="text-center">
              @if($izin_penelitian->surat_perguruan_tinggi && $izin_penelitian->proposal_penelitian && $izin_penelitian->ktp_peneliti && $izin_penelitian->izin_penelitian)
                <input type="hidden" name="status" class="form-control" value="1">
                <button type="submit" class="btn btn-success" style="background: #d41e10;border: 0;padding: 10px 24px;color: #fff;transition: 0.4s;border-radius: 4px;" onclick="return confirm('Anda Yakin ?');">Kirim Permohonan</button>
              @endif
                <a href="{{ url('pengajuan_izin_penelitian_w')}}" class="btn btn-warning" style="padding: 9px 24px;">Kembali</a>
              </div>
            
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection