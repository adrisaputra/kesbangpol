@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
	<h1 class="fontPoppins">{{ __($title) }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __($title) }}</a></li>
	</ol>
	</section>

	<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Satuan</h3>
		</div>
		
		<form action="{{ url('/izin_penelitian_di_verifikasi/edit/'.$izin_penelitian->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="box-body">
				<div class="col-lg-12">
					
					<div class="form-group">
						<label class="col-sm-4 control-label">{{ __('Surat Dari Perguruan Tinggi/Instansi Asal Peneliti')}}</label>
						<div class="col-sm-8">
							<a href="{{ url('/upload/izin_penelitian/'.$izin_penelitian->surat_perguruan_tinggi) }}" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">{{ __('Proposal Penelitian')}}</label>
						<div class="col-sm-8">
							<a href="{{ url('/upload/izin_penelitian/'.$izin_penelitian->proposal_penelitian) }}" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">{{ __('Foto Copy KTP Peneliti')}}</label>
						<div class="col-sm-8">
							<a href="{{ url('/upload/izin_penelitian/'.$izin_penelitian->ktp_peneliti) }}" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>

					@if(Request::segment(1)=="izin_penelitian_di_verifikasi" && Auth::user()->group==2)

					<div class="form-group @if ($errors->has('dokumen_rekomendasi')) has-error @endif">
						<label class="col-sm-4 control-label">{{ __('Dokumen rekomendasi') }}</label>
						<div class="col-sm-8">
							@if ($errors->has('dokumen_rekomendasi'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('dokumen_rekomendasi') }}</label>@endif
							<input type="file" class="form-control" name="dokumen_rekomendasi">
							<span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i></span>

							<div style="padding-top:10px">
								<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Upload Dokumen Rekomendasi</button>
								<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
							</div>
						</div>
					</div>
					
					@else

					<div class="form-group">
						<label class="col-sm-4 control-label">{{ __('Formulir Permohonan Izin Penelitian')}}</label>
						<div class="col-sm-8">
							<a href="{{ url('/upload/izin_penelitian/'.$izin_penelitian->izin_penelitian) }}" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
							
							<div style="padding-top:10px">
								@if(Request::segment(1)=="izin_penelitian_masuk")
									@if(Auth::user()->group==2)
										<a href="{{ url('/izin_penelitian_masuk/proses/'.$izin_penelitian->id)}}" class="btn btn-success btn-flat btn-sm" title="Tambah Data" onclick="return confirm('Anda Yakin ?');"> Terima Dokumen</a>
									@else
										<a href="{{ url('/izin_penelitian_masuk/proses/'.$izin_penelitian->id)}}" class="btn btn-success btn-flat btn-sm" title="Tambah Data" onclick="return confirm('Anda Yakin ?');"> Verifikasi Dokumen</a>
									@endif
									<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data" onclick="return confirm('Anda Yakin ?');"> Perbaiki Dokumen</button>
								@elseif(Request::segment(1)=="izin_penelitian_di_verifikasi")
									@if(Auth::user()->group==2)
										<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Upload Dokumen Rekomendasi</button>
									@endif
								@endif
								<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
							</div>

						</div>
					</div>
					
					@endif
				</div>
			</div>
		</form>
	</div>
	</section>
</div>

@endsection