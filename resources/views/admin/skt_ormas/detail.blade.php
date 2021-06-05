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
			<h3 class="box-title">{{ __($title) }}</h3>
		</div>
		
		<form action="{{ url('/skt_ormas_di_verifikasi/edit/'.$skt_ormas->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		
			<div class="box-body">
				<div class="col-lg-12">
					
					@if($skt_ormas->perbaikan)
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('Catatan Perbaikan')}}</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" value="{{ $skt_ormas->perbaikan }}" disabled>
						</div>
					</div>
					@endif
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Anggaran Dasar (AD) Anggaran Rumah Tangga (ART)')}}</label>
						<div class="col-sm-7">
							<a href="{{ url('/upload/anggaran_dasar/'.$skt_ormas->anggaran_dasar) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Logo')}}</label>
						<div class="col-sm-7">
							<a href="{{ url('/upload/logo/'.$skt_ormas->logo) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					@if($skt_ormas->bendera)
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Bendera')}}</label>
						<div class="col-sm-7">
							<a href="{{ url('/upload/bendera/'.$skt_ormas->bendera) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					@endif
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Program Kerja')}}</label>
						<div class="col-sm-7">
							<a href="{{ url('/upload/program_kerja/'.$skt_ormas->program_kerja) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Surat Keterangan Domisili Sekretariat Ormas dikeluarkan oleh Lurah/Kepala Desa Setempat atau sebutan lainnya')}}</label>
						<div class="col-sm-7" style="margin-top:13px">
							<a href="{{ url('/upload/domisili/'.$skt_ormas->domisili) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Bukti Kepemilikian atau Surat Perjanjian Kontrak atau Ijin Pakai dari Pemilik/Pengelola')}}</label>
						<div class="col-sm-7" style="margin-top:13px">
							<a href="{{ url('/upload/kepemilikan/'.$skt_ormas->kepemilikan) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Foto Kantor atau Sekretariat Ormas, Tampak Depan yang memuat papan nama')}}</label>
						<div class="col-sm-7" style="margin-top:13px">
							<a href="{{ url('/upload/foto_kantor/'.$skt_ormas->foto_kantor) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Surat Keputusan Susunan Pengurus Sesuai AD dan ART Ormas')}}</label>
						<div class="col-sm-7" style="margin-top:13px">
							<a href="{{ url('/upload/susunan_pengurus/'.$skt_ormas->susunan_pengurus) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Biodata Ketua atau sebutan lain')}}</label>
						<div class="col-sm-7" style="margin-top:3px">
							<a href="{{ url('/upload/biodata_ketua/'.$skt_ormas->biodata_ketua) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Foto Ketua berwarna  4 x 6 Terbaru ( 3 Bulan Terakhir )')}}</label>
						<div class="col-sm-7" style="margin-top:3px">
							<a href="{{ url('/upload/foto_ketua/'.$skt_ormas->foto_ketua) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan KTP Ketua')}}</label>
						<div class="col-sm-7" style="margin-top:3px">
							<a href="{{ url('/upload/ktp_ketua/'.$skt_ormas->ktp_ketua) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Biodata Sekretaris atau sebutan lain')}}</label>
						<div class="col-sm-7" style="margin-top:3px">
							<a href="{{ url('/upload/biodata_sekretaris/'.$skt_ormas->biodata_sekretaris) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Foto Sekretaris berwarna  4 x 6 Terbaru')}}</label>
						<div class="col-sm-7" style="margin-top:3px">
							<a href="{{ url('/upload/foto_sekretaris/'.$skt_ormas->foto_sekretaris) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan KTP Sekretaris')}}</label>
						<div class="col-sm-7">
							<a href="{{ url('/upload/ktp_sekretaris/'.$skt_ormas->ktp_sekretaris) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Biodata Bendahara atau sebutan lain')}}</label>
						<div class="col-sm-7" style="margin-top:3px">
							<a href="{{ url('/upload/biodata_bendahara/'.$skt_ormas->biodata_bendahara) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Foto Bendahara berwarna  4 x 6 Terbaru')}}</label>
						<div class="col-sm-7" style="margin-top:3px">
							<a href="{{ url('/upload/foto_bendahara/'.$skt_ormas->foto_bendahara) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan KTP Bendahara')}}</label>
						<div class="col-sm-7" style="margin-top:3px">
							<a href="{{ url('/upload/ktp_bendahara/'.$skt_ormas->ktp_bendahara) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Formulir Isian Data Ormas Ditandatangani Oleh Ketua dan Sekretaris Ormas atau sebutan pengurus lainnya')}}</label>
						<div class="col-sm-7" style="margin-top:13px">
							<a href="{{ url('/upload/formulir/'.$skt_ormas->formulir) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					@if($skt_ormas->rekomendasi)
					<div class="form-group">
						<label class="col-sm-5 control-label">{{ __('File Scan Rekomendasi dari Kemenag & Kemendikbud')}}</label>
						<div class="col-sm-7" style="margin-top:3px">
							<a href="{{ url('/upload/rekomendasi/'.$skt_ormas->rekomendasi) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
						</div>
					</div>
					@endif

					@if(Request::segment(1)=="skt_ormas_di_verifikasi" && Auth::user()->group==2)

						@if($skt_ormas->surat_pernyataan_kesediaan)
						<div class="form-group">
							<label class="col-sm-5 control-label">{{ __('File Scan Surat Pernyataan Kesediaan atau Persetujuan dari Pejabat Pemerintah, dan/atau tokoh masyarakat yang bersangkutan yang namanya dicantumkan dalam kepengurusan Ormas')}}</label>
							<div class="col-sm-7" style="margin-top:17px">
								<a href="{{ url('/upload/surat_pernyataan_kesediaan/'.$skt_ormas->surat_pernyataan_kesediaan) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
							</div>
						</div>
						@endif

						<div class="form-group @if ($errors->has('dokumen_rekomendasi')) has-error @endif">
							<label class="col-sm-5 control-label">{{ __('Dokumen rekomendasi') }}</label>
							<div class="col-sm-7">
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

						@if($skt_ormas->surat_pernyataan_kesediaan)
						<div class="form-group">
							<label class="col-sm-5 control-label">{{ __('File Scan Surat Pernyataan Kesediaan atau Persetujuan dari Pejabat Pemerintah, dan/atau tokoh masyarakat yang bersangkutan yang namanya dicantumkan dalam kepengurusan Ormas')}}</label>
							<div class="col-sm-7" style="margin-top:23px">
							<a href="{{ url('/upload/surat_pernyataan_kesediaan/'.$skt_ormas->surat_pernyataan_kesediaan) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
								
								<div style="padding-top:20px">
									@if(Request::segment(1)=="skt_ormas_masuk" && (Auth::user()->group==2 || Auth::user()->group==6))
										@if(Auth::user()->group==2)
											<a href="{{ url('/skt_ormas_masuk/proses/'.$skt_ormas->id)}}" class="btn btn-success btn-flat btn-sm" title="Proses Dokumen dan Kirim Ke Kepala Badan" onclick="return confirm('Anda Yakin ?');"> Proses Dokumen dan Kirim Ke Kepala Badan</a>
										@else
											<a href="{{ url('/skt_ormas_masuk/proses/'.$skt_ormas->id)}}" class="btn btn-success btn-flat btn-sm" title="Verifikasi Dokumen" onclick="return confirm('Anda Yakin ?');"> Verifikasi Dokumen</a>
										@endif

										<button type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-default">Perbaiki Dokumen</button>
									@endif
									<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
								</div>

							</div>
						</div>
						@else 
						<div class="form-group">
							<label class="col-sm-5 control-label">{{ __('File Scan Formulir Isian Data Ormas Ditandatangani Oleh Ketua dan Sekretaris Ormas atau sebutan pengurus lainnya')}}</label>
							<div class="col-sm-7" style="margin-top:13px">
							<a href="{{ url('/upload/formulir/'.$skt_ormas->formulir) }}" target="_blank" class="btn btn-info btn-flat btn-sm" title="Kembali">Lihat Dokumen</a>
								
								<div style="padding-top:20px">
									@if(Request::segment(1)=="skt_ormas_masuk" && Auth::user()->group!=1)
										@if(Auth::user()->group==2)
											<a href="{{ url('/skt_ormas_masuk/proses/'.$skt_ormas->id)}}" class="btn btn-success btn-flat btn-sm" title="Proses Dokumen dan Kirim Ke Kepala Badan" onclick="return confirm('Anda Yakin ?');"> Proses Dokumen dan Kirim Ke Kepala Badan</a>
										@else
											<a href="{{ url('/skt_ormas_masuk/proses/'.$skt_ormas->id)}}" class="btn btn-success btn-flat btn-sm" title="Verifikasi Dokumen" onclick="return confirm('Anda Yakin ?');"> Verifikasi Dokumen</a>
										@endif

										<button type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-default">Perbaiki Dokumen</button>
									@endif
									<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
								</div>

							</div>
						</div>
						@endif
					
					@endif

				</div>
			</div>
		</form>
		
		<form action="{{ url('/skt_ormas_di_verifikasi/edit/'.$skt_ormas->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
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