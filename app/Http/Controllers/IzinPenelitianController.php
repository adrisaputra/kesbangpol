<?php

namespace App\Http\Controllers;

use App\Models\IzinPenelitian;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class IzinPenelitianController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        if(Request()->segment(1)=='izin_penelitian_masuk'){

            if(Auth::user()->group==2){
                $title = "Data Masuk";
                $izin_penelitian = IzinPenelitian::select('izin_penelitian_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'izin_penelitian_tbl.user_id')
                                ->where('izin_penelitian_tbl.status',1)
                                ->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);
            } else {
                $title = "Data Masuk";
                $izin_penelitian = IzinPenelitian::select('izin_penelitian_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'izin_penelitian_tbl.user_id')
                                ->where('izin_penelitian_tbl.status',2)
                                ->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);
            }

        }elseif(Request()->segment(1)=='izin_penelitian_di_proses'){

            $title = "Data Di Proses";
            $izin_penelitian = IzinPenelitian::select('izin_penelitian_tbl.*','users.name','users.nik')
                            ->leftjoin('users', 'users.id', '=', 'izin_penelitian_tbl.user_id')
                            ->where('izin_penelitian_tbl.status',2)
                            ->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);

        }elseif(Request()->segment(1)=='izin_penelitian_di_verifikasi'){

            $title = "Data Di Verifikasi";
            if(Auth::user()->group==2){
                $izin_penelitian = IzinPenelitian::select('izin_penelitian_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'izin_penelitian_tbl.user_id')
                                ->where('izin_penelitian_tbl.status',3)
                                ->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);
            } else {
                $izin_penelitian = IzinPenelitian::select('izin_penelitian_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'izin_penelitian_tbl.user_id')
                                ->where(function ($query) {
                                    $query->where('izin_penelitian_tbl.status',3)
                                        ->orWhere('izin_penelitian_tbl.status',4);
                                })
                                ->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);
            }
            

        }elseif(Request()->segment(1)=='izin_penelitian_selesai'){

            $title = "Data Selesai";
            $izin_penelitian = IzinPenelitian::select('izin_penelitian_tbl.*','users.name','users.nik')
                            ->leftjoin('users', 'users.id', '=', 'izin_penelitian_tbl.user_id')
                            ->where('izin_penelitian_tbl.status',4)
                            ->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);
        }
       
		return view('admin.izin_penelitian.index',compact('title','izin_penelitian'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        if(Request()->segment(1)=='izin_penelitian_masuk'){

            $title = "Data Masuk";
            $izin_penelitian =  $request->get('search');
            $izin_penelitian = IzinPenelitian::select('izin_penelitian_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'izin_penelitian_tbl.user_id')
                                ->where('izin_penelitian_tbl.status',1)
                                ->where(function ($query) use ($izin_penelitian) {
                                    $query->where('kode', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('name', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$izin_penelitian.'%');
                                })->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);

        }elseif(Request()->segment(1)=='izin_penelitian_di_proses'){

            $title = "Data Di Proses";
            $izin_penelitian =  $request->get('search');
            $izin_penelitian = IzinPenelitian::select('izin_penelitian_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'izin_penelitian_tbl.user_id')
                                ->where('izin_penelitian_tbl.status',2)
                                ->where(function ($query) use ($izin_penelitian) {
                                    $query->where('kode', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('name', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$izin_penelitian.'%');
                                })->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);

        }elseif(Request()->segment(1)=='izin_penelitian_di_verifikasi'){

            $title = "Data Di Verifikasi";
            $izin_penelitian =  $request->get('search');

            if(Auth::user()->group==2){
                $izin_penelitian = IzinPenelitian::select('izin_penelitian_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'izin_penelitian_tbl.user_id')
                                ->where('izin_penelitian_tbl.status',3)
                                ->where(function ($query) use ($izin_penelitian) {
                                    $query->where('kode', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('name', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$izin_penelitian.'%');
                                })->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);
            } else {
                $izin_penelitian = IzinPenelitian::select('izin_penelitian_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'izin_penelitian_tbl.user_id')
                                ->where('izin_penelitian_tbl.status',3)
                                ->where(function ($query) {
                                    $query->where('izin_penelitian_tbl.status',3)
                                        ->orWhere('izin_penelitian_tbl.status',4);
                                })->where(function ($query) use ($izin_penelitian) {
                                    $query->where('kode', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('name', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$izin_penelitian.'%');
                                })->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);
            }
            
        }elseif(Request()->segment(1)=='izin_penelitian_selesai'){

            $title = "Data Selesai";
            $izin_penelitian =  $request->get('search');
            $izin_penelitian = IzinPenelitian::select('izin_penelitian_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'izin_penelitian_tbl.user_id')
                                ->where('izin_penelitian_tbl.status',4)
                                ->where(function ($query) use ($izin_penelitian) {
                                    $query->where('kode', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('name', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$izin_penelitian.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$izin_penelitian.'%');
                                })->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);
        }
       

		return view('admin.izin_penelitian.index',compact('title','izin_penelitian'));
    }
	
    ## Tampilkan Form Edit
    public function detail(IzinPenelitian $izin_penelitian)
    {
        $title = "Data Masuk";
        $view=view('admin.izin_penelitian.detail', compact('title','izin_penelitian'));
        $view=$view->render();
        return $view;
    }

    ## Proses Data
    public function proses(Request $request, IzinPenelitian $izin_penelitian)
    {
        if(Auth::user()->group==2){
            $izin_penelitian->status = 2;
            $izin_penelitian->save();
        } else {
            $izin_penelitian->status = 3;
            $izin_penelitian->save();
        }
		
		return redirect('/izin_penelitian_masuk')->with('status', 'Data Berhasil Diproses');
    }

    ## Edit Data
    public function update(Request $request, IzinPenelitian $izin_penelitian)
    {
        if($request->cek_perbaikan == ""){
            $this->validate($request, [
                'dokumen_rekomendasi' => 'required|mimes:pdf|max:500'
            ]);
        }

        if($izin_penelitian->dokumen_rekomendasi && $request->file('dokumen_rekomendasi')!=""){
            $image_path = public_path().'/upload/dokumen_rekomendasi/'.$izin_penelitian->dokumen_rekomendasi;
            unlink($image_path);
        }

        $izin_penelitian->fill($request->all());
        
		if($request->file('dokumen_rekomendasi') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->dokumen_rekomendasi->getClientOriginalExtension();
            $request->dokumen_rekomendasi->move(public_path('upload/dokumen_rekomendasi'), $filename);
            $izin_penelitian->dokumen_rekomendasi = $filename;
		}

		if($request->cek_perbaikan){
            $izin_penelitian->perbaikan = $request->perbaikan;
            $izin_penelitian->status = 5;

            $izin_penelitian->save();
            
            return redirect('/izin_penelitian_selesai')->with('status', 'Data Berhasil Di Kirim Untuk Diperbaiki');
        } else {
            $izin_penelitian->status = 4;

            $izin_penelitian->save();
            
            return redirect('/izin_penelitian_selesai')->with('status', 'Data Berhasil Diubah');
        }
        
    }

    ## Hapus Data
    public function delete(Request $request, IzinPenelitian $izin_penelitian)
    {
        $id = $izin_penelitian->id;
		$izin_penelitian->delete();
		
        return redirect('/izin_penelitian')->with('status', 'Data Berhasil Dihapus');
    }

    ## Download DOC
	public function download(Request $request, IzinPenelitian $izin_penelitian)
    {
		
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(public_path('FORMAT IZIN PENELITIAN.docx'));

		$templateProcessor->setValues([
			'nama' => $izin_penelitian->nama,
			'tempat' => $izin_penelitian->tempat,
			'judul' => $izin_penelitian->judul,
			'lokasi' => $izin_penelitian->lokasi,
			'waktu_kegiatan' => $izin_penelitian->waktu_kegiatan,
			'bidang' => $izin_penelitian->bidang,
			'status_kegiatan' => $izin_penelitian->status_kegiatan,
			'menimbang' => $izin_penelitian->menimbang
		]);
		// $templateProcessor->setImageValue('CompanyLogo', 'http://localhost/umkm/assets/img/logo.png');
		//$templateProcessor->setImageValue('UserLogo', array('path' => public_path('upload/foto/'.$izin_penelitian->file5), 'width' => 140, 'height' => 180, 'ratio' => false));

		header("Content-Disposition: attachment; filename=".$izin_penelitian->nama.".docx");

		$templateProcessor->saveAs('php://output');
    }

    ## Total Data Masuk
    public function total_data_masuk()
    {
        if(Auth::user()->group==2){
            $izin_penelitian = IzinPenelitian::
                                where(function ($query) {
                                    $query->where('status',1)
                                        ->orWhere('status',3);
                                })->count();
            
        }else{
            $izin_penelitian = IzinPenelitian::where('status', 2)->count();
        }
        
		if($izin_penelitian>0){
			echo "<small class='label pull-right bg-red'>".$izin_penelitian."</small>";
		} else {
            echo "<i class='fa fa-angle-left pull-right'></i>";
        }
    }

    ## Jumlah Data Masuk
    public function jumlah_data_masuk()
    {
        if(Auth::user()->group==2){
            $izin_penelitian = IzinPenelitian::where('status',1)->count();
            
        }else{
            $izin_penelitian = IzinPenelitian::where('status', 2)->count();
        }
        
		if($izin_penelitian>0){
			echo "<small class='label pull-right bg-blue'>".$izin_penelitian."</small>";
		} 
    }

    ## Jumlah Data Di Verifikasi
    public function jumlah_data_diverifikasi()
    {
        $izin_penelitian = IzinPenelitian::where('status', 3)->count();
        
		if($izin_penelitian>0){
			echo "<small class='label pull-right bg-blue'>".$izin_penelitian."</small>";
		} 
    }

}
