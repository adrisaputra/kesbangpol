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
            <div class="box-header with-border">
              <div class="box-tools pull-left" style="float: left;">
                <div style="padding-top:10px">
                  @if(Request::segment(1)!="status_skk_ormas_w")
                    <a href="{{ url('/buat_pengajuan_skk_ormas_w') }}" class="btn btn-success btn-flat" title="Buat Pengajuan" onclick="return confirm('Anda Yakin ?');">Buat Pengajuan</a>
                    <a href="{{ url('/pengajuan_skk_ormas_w') }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>   
                  @else
                    <a href="{{ url('/status_skk_ormas_w') }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>   
                  @endif 
                </div>
              </div>
              <div class="box-tools pull-right" style="float: right;margin-top: 10px;">
                <div class="form-inline">
                @if(Request::segment(1)=="pengajuan_skk_ormas_w")
                  <form action="{{ url('/pengajuan_skk_ormas_w/search') }}" method="GET">
                @else
                  <form action="{{ url('/status_skk_ormas_w/search') }}" method="GET">
                @endif
                    <div class="input-group margin">
                      <input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian" style="border-radius: 0;">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-danger btn-flat">cari</button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
            </div></div><br>

            <div class="table-responsive table-download box-body">
                <table class="table table-bordered table-striped table-hover">
                <tr class='info'>
                    <th width="10px">#</th>
                    <th width="20px">Kode Pengajuan</th>
                    <th width="20px">Tanggal Pengajuan</th>
                    <th width="160">Status</th>
                    <th width="130">Aksi</th>
                </tr>
                @foreach($data as $v)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $v->kode }}</td>
						          <td>{{ date('d-m-Y', strtotime($v->tanggal)) }}</td>
                      <td>
                        @if($v->status==0)
                          <span class="label label-danger" style="background-color: #ff5722 !important;">Silahkan Upload Dokumen Persyaratan</span>
                        @elseif($v->status==1)
                          <span class="label label-danger" style="background-color: #dd4b39 !important;">Terkirim</span>
                        @elseif($v->status==2)
                          <span class="label label-success" style="background-color: #f39c12 !important;">Sedang Di Proses</span>
                        @elseif($v->status==3)
                          <span class="label label-success" style="background-color: #3c8dbc !important;">Telah Di Verifikasi</span>
                        @elseif($v->status==4)
                          <span class="label label-success" style="background-color: #00a65a !important;">Selesai</span>
                        @else
                          <span class="label label-success" style="background-color: #00c0ef !important;">Perbaiki Laporan</span>
                        @endif
                      </td>
                      <td>
                        @if($v->status==0)
                          <a href="{{ asset('/pengajuan_skk_ormas_w/edit/'.$v->id) }}" class="btn btn-sm btn-danger btn-flat">Upload Dokumen<i class="icofont-download"></i></a>
                        @elseif($v->status==1 || $v->status==2 ||$v->status==3 )
                          <a href="{{ asset('/pengajuan_skk_ormas_w/detail/'.$v->id) }}" class="btn btn-sm btn-primary btn-flat">Lihat Dokumen<i class="icofont-download"></i></a>
                        @elseif($v->status==5 )
                          <a href="{{ asset('/pengajuan_skk_ormas_w/perbaikan/'.$v->id) }}" class="btn btn-sm btn-primary btn-flat">Perbaiki Dokumen<i class="icofont-download"></i></a>
                        @elseif($v->status==4)
                          <a href="{{ asset('/upload/dokumen_rekomendasi/'.$v->dokumen_rekomendasi) }}" target="blank" class="btn btn-sm btn-success btn-flat">Download Dok. Rekomendasi<i class="icofont-download"></i></a>
                        @endif
                      </td>
			
                    </tr>
                @endforeach
                </table>
            </div>
            <div align="right" style="float: right;">{{ $data->appends(Request::only('search'))->links() }}</div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection