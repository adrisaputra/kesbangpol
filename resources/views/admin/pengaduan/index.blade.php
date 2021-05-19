@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
	<section class="content-header">
	<h1 class="fontPoppins">{{ __('USER') }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __('USER') }}</a></li>
	</ol>
	</section>
	
	<section class="content">
	<div class="box">   
		<div class="box-header with-border">
			<div class="box-tools pull-left">
				<div style="padding-top:10px">
					<a href="{{ url('/pengaduan/create') }}" class="btn btn-success btn-flat" title="Tambah Data">Tambah</a>
					<a href="{{ url('/pengaduan') }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>    
				</div>
			</div>
			<div class="box-tools pull-right">
				<div class="form-inline">
					<form action="{{ url('/pengaduan/search') }}" method="GET">
						<div class="input-group margin">
							<input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-danger btn-flat">cari</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
			
			<div class="table-responsive box-body">

				@if ($message = Session::get('status'))
					<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i>Berhasil !</h4>
						{{ $message }}
					</div>
				@endif

				<table class="table table-bordered">
					<tr style="background-color: gray;color:white">
						<th style="width: 5px">No</th>
						<th>Nama User</th>
						<th>Email</th>
						<th>Pesan</th>
						<th>Status</th>
						<th style="width: 20%">#aksi</th>
					</tr>
					@foreach($pengaduan as $v)
					<tr>
						<td>{{ ($pengaduan ->currentpage()-1) * $pengaduan ->perpage() + $loop->index + 1 }}</td>
						<td>{{ $v->name }}</td>
						<td>{{ $v->email }}</td>
						<td>{{ $v->subjek }}</td>
						<td>
							@if ($v->status==0)
								<span class="label label-danger">Belum Dibaca </span>
							@else
								<span class="label label-success">Sudah Dibaca </span>
							@endif
						</td>
						<td>
							<a href="{{ url('/pengaduan/edit/'.$v->id ) }}" class="btn btn-xs btn-flat btn-info">Baca Aduan</a>
							<a href="{{ url('/pengaduan/hapus/'.$v->id ) }}" class="btn btn-xs btn-flat btn-danger" onclick="return confirm('Anda Yakin ?');">Hapus</a>
						</td>
					</tr>
					@endforeach
				</table>

			</div>
		<div class="box-footer">
			<!-- PAGINATION -->
			<div class="float-right">{{ $pengaduan->appends(Request::only('search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection