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
					
					@if($izin_penelitian->perbaikan)
					<div class="form-group">
						<label class="col-sm-4 control-label">{{ __('Catatan Perbaikan')}}</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="{{ $izin_penelitian->perbaikan }}" disabled>
						</div>
					</div>
					@endif
					<div class="form-group">
						<label class="col-sm-4 control-label">{{ __('Surat Dari Perguruan Tinggi/Instansi Asal Peneliti')}}</label>
						<div class="col-sm-8">
							<a href="{{ url('/upload/surat_perguruan_tinggi/'.$izin_penelitian->surat_perguruan_tinggi) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">{{ __('Proposal Penelitian')}}</label>
						<div class="col-sm-8">
							<a href="{{ url('/upload/proposal_penelitian/'.$izin_penelitian->proposal_penelitian) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">{{ __('Foto Copy KTP Peneliti')}}</label>
						<div class="col-sm-8">
							<a href="{{ url('/upload/ktp_peneliti/'.$izin_penelitian->ktp_peneliti) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">{{ __('Formulir Permohonan Izin Penelitian')}}</label>
						<div class="col-sm-8">
							<a href="{{ url('/upload/izin_penelitian/'.$izin_penelitian->izin_penelitian) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>

					@if(Request::segment(1)=="izin_penelitian_di_verifikasi" && Auth::user()->group==2)

					<div class="form-group">
						<label class="col-sm-4 control-label">{{ __('Surat Pernyataan')}}</label>
						<div class="col-sm-8">
							<a href="{{ url('/upload/surat_pernyataan/'.$izin_penelitian->surat_pernyataan) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>

					<div class="form-group @if ($errors->has('dokumen_rekomendasi')) has-error @endif">
						<label class="col-sm-4 control-label">{{ __('Dokumen rekomendasi') }}</label>
						<div class="col-sm-8">
							@if ($errors->has('dokumen_rekomendasi'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('dokumen_rekomendasi') }}</label>@endif
							<input type="file" class="form-control" name="dokumen_rekomendasi">
							<span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (pdf)</i></span>

							<div style="padding-top:10px">
								<a href="{{ url('/izin_penelitian_selesai/download/'.$izin_penelitian->id) }}" target="_blank" class="btn btn-success btn-flat btn-sm" title="Kembali">Download Format</a>
								<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Upload Dokumen Rekomendasi</button>
								<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
							</div>
						</div>
					</div>
					
					@else

					<div class="form-group">
						<label class="col-sm-4 control-label">{{ __('Surat Pernyataan')}}</label>
						<div class="col-sm-8">
							<a href="{{ url('/upload/surat_pernyataan/'.$izin_penelitian->surat_pernyataan) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
							
							<div style="padding-top:10px">
								@if(Request::segment(1)=="izin_penelitian_masuk")
									@if(Auth::user()->group==2)
										<a href="{{ url('/izin_penelitian_masuk/proses/'.$izin_penelitian->id)}}" class="btn btn-success btn-flat btn-sm" title="Proses Dokumen dan Kirim Ke Kepala Badan" onclick="return confirm('Anda Yakin ?');"> Proses Dokumen dan Kirim Ke Kepala Badan</a>
									@else
										<a href="{{ url('/izin_penelitian_masuk/proses/'.$izin_penelitian->id)}}" class="btn btn-success btn-flat btn-sm" title="Verifikasi Dokumen" onclick="return confirm('Anda Yakin ?');"> Verifikasi Dokumen</a>
									@endif

									<button type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-default">Perbaiki Dokumen</button>
								@endif
								<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
							</div>

						</div>
					</div>
					
					@endif

				</div>
			</div>
		</form>
		
		<form action="{{ url('/izin_penelitian_di_verifikasi/edit/'.$izin_penelitian->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="modal fade" id="modal-default">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">{{ __('Catatan Perbaikan') }}</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<div class="col-sm-12">
									<input type="hidden" name="cek_perbaikan" class="form-control" value="1">
									<textarea class="form-control" placeholder="Catatan Perbaikan" name="perbaikan" required></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Perbaiki Dokumen</button>
						</div>
					</div>
				</div>
			</div>

		</form>
		
	</div>
	</section>
</div>

@endsection