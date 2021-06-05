@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
	<h1 class="fontPoppins">{{ __('DOKUMEN') }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __('DOKUMEN') }}</a></li>
	</ol>
	</section>

	<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Dokumen</h3>
		</div>
		
		<form action="{{ url('/dokumen/edit/'.$dokumen->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="box-body">
				<div class="col-lg-12">
					
				<div class="form-group @if ($errors->has('judul')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Judul') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('judul'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('judul') }}</label>@endif
							<input type="text" class="form-control" placeholder="Nama Dokumen" name="judul" value="{{ $dokumen->judul }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('dokumen')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Dokumen') }}</label>
						<div class="col-sm-4">
							<i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb</i><br>
							@if ($errors->has('dokumen'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('dokumen') }}</label>@endif
							<input type="file" class="form-control" name="dokumen" >
							<br>
							
						</div>
						<div class="col-sm-2" style="padding-top:20px" >
							@if($dokumen->dokumen)
								<a href="{{ asset('upload/dokumen/'.$dokumen->dokumen) }}" target="_blank" class="btn btn-sm btn-primary" >Lihat File</a>
							@endif
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('group')) has-error @endif">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<div>
								<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Simpan</button>
								<button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset Data"> Reset</button>
								<a href="{{ url('/dokumen') }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
	</section>
</div>

@endsection