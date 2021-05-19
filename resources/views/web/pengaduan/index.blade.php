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
                    <a href="{{ url('/pengaduan_w/create') }}" class="btn btn-success btn-flat" title="Buat Pengajuan">Buat Aduan</a>
                    <a href="{{ url('/pengaduan_w') }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>   
                </div>
              </div>
              <div class="box-tools pull-right" style="float: right;margin-top: 10px;">
                <div class="form-inline">
                  <form action="{{ url('/pengaduan_w/search') }}" method="GET">
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
                    <th width="1px">#</th>
                    <th width="500px">Pesan Aduan</th>
                    <th width="100px">Status</th>
                </tr>
                @foreach($data as $v)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $v->pesan }}</td>
                      <td>
                        @if($v->status==0)
                          <span class="label label-danger" style="background-color: #dd4b39 !important;">Terkirim</span>
                        @else
                        <span class="label label-success" style="background-color: #00a65a !important;">Selesai</span>
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