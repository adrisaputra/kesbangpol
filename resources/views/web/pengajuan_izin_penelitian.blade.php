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
                  <a href="{{ url('/buat_pengajuan_izin_penelitian_w') }}" class="btn btn-success btn-flat" title="Buat Pengajuan">Buat Pengajuan</a>
                  <a href="{{ url('/pengajuan_izin_penelitian_w') }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>    
                </div>
              </div>
              <div class="box-tools pull-right" style="float: right;margin-top: 10px;">
                <div class="form-inline">
                  <form action="{{ url('/user/search') }}" method="GET">
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
                    <th>#</th>
                    <th width="">Dokumen Regulasi</th>
                    <th width="160">Tgl Update</th>
                    <th width="130">Aksi</th>
                </tr>
                @foreach($data as $v)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td class="txt-file">
                        {{ $v->status }}
                      </td>
                      <td class="txt-file">{{ $v->updated_at }}</td>
                      <!--td><a href="/upload/regulasi/{{ $v->file }}" target="blank" class="btn btn-sm btn-primary">Download <i class="icofont-download"></i></a></td-->
                      <td><a href="/download_file_regulasi_w/{{ $v->id }}" target="blank" class="btn btn-sm btn-primary btn-flat">Download <i class="icofont-download"></i></a></td>
			
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