<?php

namespace App\Http\Controllers;

use App\Models\SktOrmas;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class SktOrmasController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        if(Request()->segment(1)=='skt_ormas_masuk'){

            if(Auth::user()->group==2){
                $title = "Data Masuk";
                $skt_ormas = SktOrmas::select('skt_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skt_ormas_tbl.user_id')
                                ->where('skt_ormas_tbl.status',1)
                                ->orderBy('skt_ormas_tbl.id','DESC')->paginate(25);
            } else {
                $title = "Data Masuk";
                $skt_ormas = SktOrmas::select('skt_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skt_ormas_tbl.user_id')
                                ->where('skt_ormas_tbl.status',2)
                                ->orderBy('skt_ormas_tbl.id','DESC')->paginate(25);
            }

        }elseif(Request()->segment(1)=='skt_ormas_di_proses'){

            $title = "Data Di Proses";
            $skt_ormas = SktOrmas::select('skt_ormas_tbl.*','users.name','users.nik')
                            ->leftjoin('users', 'users.id', '=', 'skt_ormas_tbl.user_id')
                            ->where('skt_ormas_tbl.status',2)
                            ->orderBy('skt_ormas_tbl.id','DESC')->paginate(25);

        }elseif(Request()->segment(1)=='skt_ormas_di_verifikasi'){

            $title = "Data Di Verifikasi";
            if(Auth::user()->group==2){
                $skt_ormas = SktOrmas::select('skt_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skt_ormas_tbl.user_id')
                                ->where('skt_ormas_tbl.status',3)
                                ->orderBy('skt_ormas_tbl.id','DESC')->paginate(25);
            } else {
                $skt_ormas = SktOrmas::select('skt_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skt_ormas_tbl.user_id')
                                ->where(function ($query) {
                                    $query->where('skt_ormas_tbl.status',3)
                                        ->orWhere('skt_ormas_tbl.status',4);
                                })
                                ->orderBy('skt_ormas_tbl.id','DESC')->paginate(25);
            }
            

        }elseif(Request()->segment(1)=='skt_ormas_selesai'){

            $title = "Data Selesai";
            $skt_ormas = SktOrmas::select('skt_ormas_tbl.*','users.name','users.nik')
                            ->leftjoin('users', 'users.id', '=', 'skt_ormas_tbl.user_id')
                            ->where('skt_ormas_tbl.status',4)
                            ->orderBy('skt_ormas_tbl.id','DESC')->paginate(25);
        }
       
		return view('admin.skt_ormas.index',compact('title','skt_ormas'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        if(Request()->segment(1)=='skt_ormas_masuk'){

            $title = "Data Masuk";
            $skt_ormas =  $request->get('search');
            $skt_ormas = SktOrmas::select('skt_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skt_ormas_tbl.user_id')
                                ->where('skt_ormas_tbl.status',1)
                                ->where(function ($query) use ($skt_ormas) {
                                    $query->where('kode', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('name', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$skt_ormas.'%');
                                })->orderBy('skt_ormas_tbl.id','DESC')->paginate(25);

        }elseif(Request()->segment(1)=='skt_ormas_di_proses'){

            $title = "Data Di Proses";
            $skt_ormas =  $request->get('search');
            $skt_ormas = SktOrmas::select('skt_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skt_ormas_tbl.user_id')
                                ->where('skt_ormas_tbl.status',2)
                                ->where(function ($query) use ($skt_ormas) {
                                    $query->where('kode', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('name', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$skt_ormas.'%');
                                })->orderBy('skt_ormas_tbl.id','DESC')->paginate(25);

        }elseif(Request()->segment(1)=='skt_ormas_di_verifikasi'){

            $title = "Data Di Verifikasi";
            $skt_ormas =  $request->get('search');

            if(Auth::user()->group==2){
                $skt_ormas = SktOrmas::select('skt_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skt_ormas_tbl.user_id')
                                ->where('skt_ormas_tbl.status',3)
                                ->where(function ($query) use ($skt_ormas) {
                                    $query->where('kode', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('name', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$skt_ormas.'%');
                                })->orderBy('skt_ormas_tbl.id','DESC')->paginate(25);
            } else {
                $skt_ormas = SktOrmas::select('skt_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skt_ormas_tbl.user_id')
                                ->where(function ($query) {
                                    $query->where('skt_ormas_tbl.status',3)
                                        ->orWhere('skt_ormas_tbl.status',4);
                                })->where(function ($query) use ($skt_ormas) {
                                    $query->where('kode', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('name', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$skt_ormas.'%');
                                })->orderBy('skt_ormas_tbl.id','DESC')->paginate(25);
            }
            
        }elseif(Request()->segment(1)=='skt_ormas_selesai'){

            $title = "Data Selesai";
            $skt_ormas =  $request->get('search');
            $skt_ormas = SktOrmas::select('skt_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skt_ormas_tbl.user_id')
                                ->where('skt_ormas_tbl.status',4)
                                ->where(function ($query) use ($skt_ormas) {
                                    $query->where('kode', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('name', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$skt_ormas.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$skt_ormas.'%');
                                })->orderBy('skt_ormas_tbl.id','DESC')->paginate(25);
        }
       

		return view('admin.skt_ormas.index',compact('title','skt_ormas'));
    }
	
    ## Tampilkan Form Edit
    public function detail(SktOrmas $skt_ormas)
    {
        $title = "Data Masuk";
        $view=view('admin.skt_ormas.detail', compact('title','skt_ormas'));
        $view=$view->render();
        return $view;
    }

    ## Proses Data
    public function proses(Request $request, SktOrmas $skt_ormas)
    {
        if(Auth::user()->group==2){
            $skt_ormas->status = 2;
            $skt_ormas->save();
        } else {
            $skt_ormas->status = 3;
            $skt_ormas->save();
        }
		
		return redirect('/skt_ormas_masuk')->with('status', 'Data Di Verifikasi');
    }

    ## Edit Data
    public function update(Request $request, SktOrmas $skt_ormas)
    {
        if($request->cek_perbaikan == ""){
            $this->validate($request, [
                'dokumen_rekomendasi' => 'required|mimes:pdf|max:500'
            ]);
        }

        if($skt_ormas->dokumen_rekomendasi && $request->file('dokumen_rekomendasi')!=""){
            $image_path = public_path().'/upload/dokumen_rekomendasi/'.$skt_ormas->dokumen_rekomendasi;
            unlink($image_path);
        }

        $skt_ormas->fill($request->all());
        
		if($request->file('dokumen_rekomendasi') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->dokumen_rekomendasi->getClientOriginalExtension();
            $request->dokumen_rekomendasi->move(public_path('upload/dokumen_rekomendasi'), $filename);
            $skt_ormas->dokumen_rekomendasi = $filename;
		}

		if($request->cek_perbaikan){
            $skt_ormas->perbaikan = $request->perbaikan;
            $skt_ormas->status = 5;

            $skt_ormas->save();
            
            return redirect('/skt_ormas_selesai')->with('status', 'Data Berhasil Di Kirim Untuk Diperbaiki');
        } else {
            $skt_ormas->status = 4;

            $skt_ormas->save();
            
            return redirect('/skt_ormas_selesai')->with('status', 'Data Berhasil Diubah');
        }
        
    }

    ## Hapus Data
    public function delete(SktOrmas $skt_ormas)
    {
        $id = $skt_ormas->id;
		$skt_ormas->delete();
		
        return redirect('/skt_ormas')->with('status', 'Data Berhasil Dihapus');
    }
    
    ## Total Data Masuk
    public function total_data_masuk()
    {
        if(Auth::user()->group==2){
            $skt_ormas = SktOrmas::
                        where(function ($query) {
                            $query->where('status',1)
                                ->orWhere('status',3);
                        })->count();
        }else{
            $skt_ormas = SktOrmas::where('status', 2)->count();
        }
        
		if($skt_ormas>0){
			echo "<small class='label pull-right bg-red'>".$skt_ormas."</small>";
		} else {
            echo "<i class='fa fa-angle-left pull-right'></i>";
        }
    }

    
    ## Jumlah Data Masuk
    public function jumlah_data_masuk()
    {
        if(Auth::user()->group==2){
            $skt_ormas = SktOrmas::where('status',1)->count();
            
        }else{
            $skt_ormas = SktOrmas::where('status', 2)->count();
        }
        
		if($skt_ormas>0){
			echo "<small class='label pull-right bg-blue'>".$skt_ormas."</small>";
		} 
    }

    ## Jumlah Data Di Verifikasi
    public function jumlah_data_diverifikasi()
    {
        $skt_ormas = SktOrmas::where('status', 3)->count();
        
		if($skt_ormas>0){
			echo "<small class='label pull-right bg-blue'>".$skt_ormas."</small>";
		} 
    }

}
