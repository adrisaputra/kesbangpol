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
            
              @if ($message = Session::get('status'))
                <p class="alert text-center" style="color: #ffffff;background-color: #4caf50;border-color: #d6e9c6;">
                  {{ $message }}
                </p>
              @endif

              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:5px">Kode Pengajuan</p>
                </div>
                <div class="col-md-7 form-group">
                  <input type="text" name="anggaran_dasar" class="form-control" value="{{ $skt_ormas->kode }}" disabled>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:5px">Catatan Perbaikan</p>
                </div>
                <div class="col-md-7 form-group">
                  <textarea class="form-control" disabled>{{ $skt_ormas->perbaikan }}</textarea>
                </div>
              </div>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:10px">File Scan Anggaran Dasar (AD) Anggaran Rumah Tangga (ART)</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="1">
                    <input type="file" name="anggaran_dasar" class="form-control">
                    @if ($errors->has('anggaran_dasar')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('anggaran_dasar') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/anggaran_dasar/'.$skt_ormas->anggaran_dasar) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">File Scan Logo</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="2">
                    <input type="file" name="logo" class="form-control">
                    @if ($errors->has('logo')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('logo') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/logo/'.$skt_ormas->logo) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">File Scan Bendera *) Tidak Wajib Ada</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="3">
                    <input type="file" name="bendera" class="form-control">
                    @if ($errors->has('bendera')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('bendera') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/bendera/'.$skt_ormas->bendera) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">File Scan Program Kerja</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="4">
                    <input type="file" name="program_kerja" class="form-control">
                    @if ($errors->has('program_kerja')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('program_kerja') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/program_kerja/'.$skt_ormas->program_kerja) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:5px">File Scan Surat Keterangan Domisili Sekretariat Ormas dikeluarkan oleh Lurah/Kepala Desa Setempat atau sebutan lainnya</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="5">
                    <input type="file" name="domisili" class="form-control">
                    @if ($errors->has('domisili')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('domisili') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/domisili/'.$skt_ormas->domisili) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>
              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:10px">File Scan Bukti Kepemilikian atau Surat Perjanjian Kontrak atau Ijin Pakai dari Pemilik/Pengelola</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="6">
                    <input type="file" name="kepemilikan" class="form-control">
                    @if ($errors->has('kepemilikan')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('kepemilikan') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/kepemilikan/'.$skt_ormas->kepemilikan) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:10px">File Scan Foto Kantor atau Sekretariat Ormas, Tampak Depan yang memuat papan nama</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="7">
                    <input type="file" name="foto_kantor" class="form-control">
                    @if ($errors->has('foto_kantor')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('foto_kantor') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/foto_kantor/'.$skt_ormas->foto_kantor) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:10px">File Scan Surat Keputusan Susunan Pengurus Sesuai AD dan ART Ormas</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="8">
                    <input type="file" name="susunan_pengurus" class="form-control">
                    @if ($errors->has('susunan_pengurus')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('susunan_pengurus') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/susunan_pengurus/'.$skt_ormas->susunan_pengurus) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">File Scan Biodata Ketua atau sebutan lain</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="9">
                    <input type="file" name="biodata_ketua" class="form-control">
                    @if ($errors->has('biodata_ketua')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('biodata_ketua') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/biodata_ketua/'.$skt_ormas->biodata_ketua) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>
            
            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:15px">File Scan Foto Ketua berwarna  4 x 6 Terbaru ( 3 Bulan Terakhir )</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="10">
                    <input type="file" name="foto_ketua" class="form-control">
                    @if ($errors->has('foto_ketua')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('foto_ketua') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/foto_ketua/'.$skt_ormas->foto_ketua) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">File Scan KTP Ketua</p>
                </div>

                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="11">
                    <input type="file" name="ktp_ketua" class="form-control">
                    @if ($errors->has('ktp_ketua')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('ktp_ketua') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/ktp_ketua/'.$skt_ormas->ktp_ketua) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">File Scan Biodata Sekretaris atau sebutan lain</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="12">
                    <input type="file" name="biodata_sekretaris" class="form-control">
                    @if ($errors->has('biodata_sekretaris')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('biodata_sekretaris') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/biodata_sekretaris/'.$skt_ormas->biodata_sekretaris) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>
            
            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:10px">File Scan Foto Sekretaris berwarna  4 x 6 Terbaru ( 3 Bulan Terakhir )</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="13">
                    <input type="file" name="foto_sekretaris" class="form-control">
                    @if ($errors->has('foto_sekretaris')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('foto_sekretaris') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/foto_sekretaris/'.$skt_ormas->foto_sekretaris) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">File Scan KTP Sekretaris</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="14">
                    <input type="file" name="ktp_sekretaris" class="form-control">
                    @if ($errors->has('ktp_sekretaris')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('ktp_sekretaris') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/ktp_sekretaris/'.$skt_ormas->ktp_sekretaris) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">File Scan Biodata Bendahara atau sebutan lain</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="15">
                    <input type="file" name="biodata_bendahara" class="form-control">
                    @if ($errors->has('biodata_bendahara')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('biodata_bendahara') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/biodata_bendahara/'.$skt_ormas->biodata_bendahara) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>
            
            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:10px">File Scan Foto Bendahara berwarna  4 x 6 Terbaru ( 3 Bulan Terakhir )</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="16">
                    <input type="file" name="foto_bendahara" class="form-control">
                    @if ($errors->has('foto_bendahara')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('foto_bendahara') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/foto_bendahara/'.$skt_ormas->foto_bendahara) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">File Scan KTP Bendahara</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="17">
                    <input type="file" name="ktp_bendahara" class="form-control">
                    @if ($errors->has('ktp_bendahara')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('ktp_bendahara') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/ktp_bendahara/'.$skt_ormas->ktp_bendahara) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:5px">File Scan Formulir Isian Data Ormas Ditandatangani Oleh Ketua dan Sekretaris Ormas atau sebutan pengurus lainnya</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="18">
                    <input type="file" name="formulir" class="form-control">
                    @if ($errors->has('formulir')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('formulir') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/formulir/'.$skt_ormas->formulir) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:15px">File Scan Rekomendasi dari Kemenag & Kemendikbud *) Tidak Wajib ada</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="19">
                    <input type="file" name="rekomendasi" class="form-control">
                    @if ($errors->has('rekomendasi')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('rekomendasi') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/rekomendasi/'.$skt_ormas->rekomendasi) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:15px">File Scan Surat Pernyataan Sesuai Permendagri 57 tahun 2017</p>
                </div>
                
                  <div class="col-md-3 form-group">
                    <i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="20">
                    <input type="file" name="surat_pernyataan_permendagri" class="form-control">
                    @if ($errors->has('surat_pernyataan_permendagri')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('surat_pernyataan_permendagri') }}</label>@endif
                  </div>
                  <div class="col-md-2 form-group">
                      <a href="{{ asset('/upload/surat_pernyataan_permendagri/'.$skt_ormas->surat_pernyataan_permendagri) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  <div class="col-md-2 form-group">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="row">
                <div class="col-md-5 form-group">
                  <p style="margin-top:25px">File Scan Surat Pernyataan Kesediaan atau Persetujuan dari Pejabat Pemerintah, dan/atau tokoh masyarakat yang bersangkutan yang namanya dicantumkan dalam kepengurusan Ormas *) Tidak Wajib Ada </p>
                </div>
                
                  <div class="col-md-3 form-group" style="margin-top:35px">
                    <i style="font-size:10px" >Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i><br>
                    <input type="hidden" name="file" class="form-control" value="21">
                    <input type="file" name="surat_pernyataan_kesediaan" class="form-control">
                    @if ($errors->has('surat_pernyataan_kesediaan')) <label style="font-size:12px;color: #f44336;">{{ $errors->first('surat_pernyataan_kesediaan') }}</label>@endif
                  </div>
                  @if ($skt_ormas->surat_pernyataan_kesediaan)
                  <div class="col-md-2 form-group" style="margin-top:35px">
                      <a href="{{ asset('/upload/surat_pernyataan_kesediaan/'.$skt_ormas->surat_pernyataan_kesediaan) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                  </div>
                  @endif
                  <div class="col-md-2 form-group" style="margin-top:35px">
                      <button type="submit" class="btn btn-success" style="background: #00a65a;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Upload</button>
                  </div>

              </div>

            </form>

            <br>
              
            <form action="{{ url('/pengajuan_skt_ormas_w/perbaikan/'.$skt_ormas->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
		        <input type="hidden" name="_method" value="PUT">
						
              <div class="text-center">
              @if($skt_ormas->anggaran_dasar 
                  && $skt_ormas->logo 
                  && $skt_ormas->program_kerja
                  && $skt_ormas->domisili
                  && $skt_ormas->kepemilikan
                  && $skt_ormas->foto_kantor
                  && $skt_ormas->susunan_pengurus
                  && $skt_ormas->biodata_ketua
                  && $skt_ormas->foto_ketua
                  && $skt_ormas->ktp_ketua
                  && $skt_ormas->biodata_sekretaris
                  && $skt_ormas->foto_sekretaris
                  && $skt_ormas->ktp_sekretaris
                  && $skt_ormas->biodata_bendahara
                  && $skt_ormas->foto_bendahara
                  && $skt_ormas->ktp_bendahara
                  && $skt_ormas->formulir
                  && $skt_ormas->surat_pernyataan_permendagri)
                <input type="hidden" name="status" class="form-control" value="1">
                <button type="submit" class="btn btn-success" style="background: #d41e10;border: 0;padding: 10px 24px;color: #fff;transition: 0.4s;border-radius: 4px;" onclick="return confirm('Anda Yakin ?');">Kirim Permohonan</button>
              @endif
                <a href="{{ url('pengajuan_skt_ormas_w')}}" class="btn btn-warning" style="padding: 9px 24px;">Kembali</a>
              </div>
            
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection