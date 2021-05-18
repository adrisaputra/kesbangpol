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
                  <input type="text" name="surat_perguruan_tinggi" class="form-control" value="{{ $skt_ormas->kode }}" disabled>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Anggaran Dasar (AD) Anggaran Rumah Tangga (ART)</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/anggaran_dasar/'.$skt_ormas->anggaran_dasar) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Logo</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/logo/'.$skt_ormas->logo) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              @if($skt_ormas->bendera)
              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Bendera</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/bendera/'.$skt_ormas->bendera) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>
              @endif

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Program Kerja</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/program_kerja/'.$skt_ormas->program_kerja) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:10px">File Scan Surat Keterangan Domisili Sekretariat Ormas dikeluarkan oleh Lurah/Kepala Desa Setempat atau sebutan lainnya</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/domisili/'.$skt_ormas->domisili) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Bukti Kepemilikian atau Surat Perjanjian Kontrak atau Ijin Pakai dari Pemilik/Pengelola</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/kepemilikan/'.$skt_ormas->kepemilikan) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Foto Kantor atau Sekretariat Ormas, Tampak Depan yang memuat papan nama</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/foto_kantor/'.$skt_ormas->foto_kantor) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:15px">File Scan Surat Keputusan Susunan Pengurus Sesuai AD dan ART Ormas</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/susunan_pengurus/'.$skt_ormas->susunan_pengurus) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Biodata Ketua atau sebutan lain</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/biodata_ketua/'.$skt_ormas->biodata_ketua) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Foto Ketua berwarna  4 x 6 Terbaru ( 3 Bulan Terakhir )</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/foto_ketua/'.$skt_ormas->foto_ketua) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan KTP Ketua</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/ktp_ketua/'.$skt_ormas->ktp_ketua) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Biodata Sekretaris atau sebutan lain</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/biodata_sekretaris/'.$skt_ormas->biodata_sekretaris) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Foto Sekretaris berwarna  4 x 6 Terbaru</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/foto_sekretaris/'.$skt_ormas->foto_sekretaris) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan KTP Sekretaris</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/ktp_sekretaris/'.$skt_ormas->ktp_sekretaris) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Biodata Bendahara atau sebutan lain</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/biodata_bendahara/'.$skt_ormas->biodata_bendahara) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Foto Bendahara berwarna  4 x 6 Terbaru</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/foto_bendahara/'.$skt_ormas->foto_bendahara) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan KTP Bendahara</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/ktp_bendahara/'.$skt_ormas->ktp_bendahara) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:15px">File Scan Formulir Isian Data Ormas Ditandatangani Oleh Ketua dan Sekretaris Ormas atau sebutan pengurus lainnya</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/formulir/'.$skt_ormas->formulir) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              @if($skt_ormas->rekomendasi)
              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Rekomendasi dari Kemenag & Kemendikbud</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/rekomendasi/'.$skt_ormas->rekomendasi) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>
              @endif

              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Surat Pernyataan Sesuai Permendagri 57 tahun 2017</p>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ asset('/upload/surat_pernyataan_permendagri/'.$skt_ormas->surat_pernyataan_permendagri) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>

              @if($skt_ormas->surat_pernyataan_kesediaan)
              <div class="row">
                <div class="col-md-6 form-group">
                  <p style="margin-top:25px">File Scan Surat Pernyataan Kesediaan atau Persetujuan dari Pejabat Pemerintah, dan/atau tokoh masyarakat yang bersangkutan yang namanya dicantumkan dalam kepengurusan Ormas</p>
                </div>
                <div class="col-md-6 form-group" style="margin-top:25px">
                    <a href="{{ asset('/upload/surat_pernyataan_kesediaan/'.$skt_ormas->surat_pernyataan_kesediaan) }}" target="_blank" class="btn btn-danger" style="background: #3c8dbc;border: 0;color: #fff;transition: 0.4s;border-radius: 4px;margin-top:24px">Lihat Dokumen<i class="icofont-download"></i></a>
                </div>
              </div>
              @endif

              <br>
              
              <div class="text-center">
                <a href="{{ url('status_skt_ormas_w')}}" class="btn btn-warning" style="padding: 9px 24px;">Kembali</a>
              </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection