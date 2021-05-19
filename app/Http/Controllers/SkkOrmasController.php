<?php

namespace App\Http\Controllers;

use App\Models\SkkOrmas;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;


class SkkOrmasController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        if(Request()->segment(1)=='skk_ormas_masuk'){

            if(Auth::user()->group==2){
                $title = "Data Masuk";
                $skk_ormas = SkkOrmas::select('skk_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skk_ormas_tbl.user_id')
                                ->where('skk_ormas_tbl.status',1)
                                ->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);
            } else {
                $title = "Data Masuk";
                $skk_ormas = SkkOrmas::select('skk_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skk_ormas_tbl.user_id')
                                ->where('skk_ormas_tbl.status',2)
                                ->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);
            }

        }elseif(Request()->segment(1)=='skk_ormas_di_proses'){

            $title = "Data Di Proses";
            $skk_ormas = SkkOrmas::select('skk_ormas_tbl.*','users.name','users.nik')
                            ->leftjoin('users', 'users.id', '=', 'skk_ormas_tbl.user_id')
                            ->where('skk_ormas_tbl.status',2)
                            ->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);

        }elseif(Request()->segment(1)=='skk_ormas_di_verifikasi'){

            $title = "Data Di Verifikasi";
            if(Auth::user()->group==2){
                $skk_ormas = SkkOrmas::select('skk_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skk_ormas_tbl.user_id')
                                ->where('skk_ormas_tbl.status',3)
                                ->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);
            } else {
                $skk_ormas = SkkOrmas::select('skk_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skk_ormas_tbl.user_id')
                                ->where(function ($query) {
                                    $query->where('skk_ormas_tbl.status',3)
                                        ->orWhere('skk_ormas_tbl.status',4);
                                })
                                ->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);
            }
            

        }elseif(Request()->segment(1)=='skk_ormas_selesai'){

            $title = "Data Selesai";
            $skk_ormas = SkkOrmas::select('skk_ormas_tbl.*','users.name','users.nik')
                            ->leftjoin('users', 'users.id', '=', 'skk_ormas_tbl.user_id')
                            ->where('skk_ormas_tbl.status',4)
                            ->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);
        }
       
		return view('admin.skk_ormas.index',compact('title','skk_ormas'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        if(Request()->segment(1)=='skk_ormas_masuk'){

            $title = "Data Masuk";
            $skk_ormas =  $request->get('search');
            $skk_ormas = SkkOrmas::select('skk_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skk_ormas_tbl.user_id')
                                ->where('skk_ormas_tbl.status',1)
                                ->where(function ($query) use ($skk_ormas) {
                                    $query->where('kode', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('name', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$skk_ormas.'%');
                                })->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);

        }elseif(Request()->segment(1)=='skk_ormas_di_proses'){

            $title = "Data Di Proses";
            $skk_ormas =  $request->get('search');
            $skk_ormas = SkkOrmas::select('skk_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skk_ormas_tbl.user_id')
                                ->where('skk_ormas_tbl.status',2)
                                ->where(function ($query) use ($skk_ormas) {
                                    $query->where('kode', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('name', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$skk_ormas.'%');
                                })->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);

        }elseif(Request()->segment(1)=='skk_ormas_di_verifikasi'){

            $title = "Data Di Verifikasi";
            $skk_ormas =  $request->get('search');

            if(Auth::user()->group==2){
                $skk_ormas = SkkOrmas::select('skk_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skk_ormas_tbl.user_id')
                                ->where('skk_ormas_tbl.status',3)
                                ->where(function ($query) use ($skk_ormas) {
                                    $query->where('kode', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('name', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$skk_ormas.'%');
                                })->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);
            } else {
                $skk_ormas = SkkOrmas::select('skk_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skk_ormas_tbl.user_id')
                                ->where(function ($query) {
                                    $query->where('skk_ormas_tbl.status',3)
                                        ->orWhere('skk_ormas_tbl.status',4);
                                })->where(function ($query) use ($skk_ormas) {
                                    $query->where('kode', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('name', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$skk_ormas.'%');
                                })->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);
            }
            
        }elseif(Request()->segment(1)=='skk_ormas_selesai'){

            $title = "Data Selesai";
            $skk_ormas =  $request->get('search');
            $skk_ormas = SkkOrmas::select('skk_ormas_tbl.*','users.name','users.nik')
                                ->leftjoin('users', 'users.id', '=', 'skk_ormas_tbl.user_id')
                                ->where('skk_ormas_tbl.status',4)
                                ->where(function ($query) use ($skk_ormas) {
                                    $query->where('kode', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('name', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('nik', 'LIKE', '%'.$skk_ormas.'%')
                                        ->orWhere('tanggal', 'LIKE', '%'.$skk_ormas.'%');
                                })->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);
        }
       

		return view('admin.skk_ormas.index',compact('title','skk_ormas'));
    }
	
    ## Tampilkan Form Edit
    public function detail(SkkOrmas $skk_ormas)
    {
        $title = "Data Masuk";
        $view=view('admin.skk_ormas.detail', compact('title','skk_ormas'));
        $view=$view->render();
        return $view;
    }

    ## Proses Data
    public function proses(Request $request, SkkOrmas $skk_ormas)
    {
        if(Auth::user()->group==2){
            $skk_ormas->status = 2;
            $skk_ormas->save();
        } else {
            $skk_ormas->status = 3;
            $skk_ormas->save();
        }
		
		return redirect('/skk_ormas_masuk')->with('status', 'Data Di Verifikasi');
    }

    ## Edit Data
    public function update(Request $request, SkkOrmas $skk_ormas)
    {
        if($request->cek_perbaikan == ""){
            $this->validate($request, [
                'dokumen_rekomendasi' => 'required|mimes:pdf|max:500'
            ]);
        }

        if($skk_ormas->dokumen_rekomendasi && $request->file('dokumen_rekomendasi')!=""){
            $image_path = public_path().'/upload/dokumen_rekomendasi/'.$skk_ormas->dokumen_rekomendasi;
            unlink($image_path);
        }

        $skk_ormas->fill($request->all());
        
		if($request->file('dokumen_rekomendasi') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->dokumen_rekomendasi->getClientOriginalExtension();
            $request->dokumen_rekomendasi->move(public_path('upload/dokumen_rekomendasi'), $filename);
            $skk_ormas->dokumen_rekomendasi = $filename;
		}

		if($request->cek_perbaikan){
            $skk_ormas->perbaikan = $request->perbaikan;
            $skk_ormas->status = 5;

            $skk_ormas->save();
            
            return redirect('/skk_ormas_selesai')->with('status', 'Data Berhasil Di Kirim Untuk Diperbaiki');
        } else {
            $skk_ormas->status = 4;

            $skk_ormas->save();
            
            return redirect('/skk_ormas_selesai')->with('status', 'Data Berhasil Diubah');
        }
        
    }

    ## Hapus Data
    public function delete(SkkOrmas $skk_ormas)
    {
        $id = $skk_ormas->id;
		$skk_ormas->delete();
		
        return redirect('/skk_ormas')->with('status', 'Data Berhasil Dihapus');
    }

    ## Total Data Masuk
    public function total_data_masuk()
    {
        if(Auth::user()->group==2){
            $skk_ormas = SkkOrmas::
                        where(function ($query) {
                            $query->where('status',1)
                                ->orWhere('status',3);
                        })->count();
        }else{
            $skk_ormas = SkkOrmas::where('status', 2)->count();
        }
        
		if($skk_ormas>0){
			echo "<small class='label pull-right bg-red'>".$skk_ormas."</small>";
		} else {
            echo "<i class='fa fa-angle-left pull-right'></i>";
        }
    }

    
    ## Jumlah Data Masuk
    public function jumlah_data_masuk()
    {
        if(Auth::user()->group==2){
            $skk_ormas = SkkOrmas::where('status',1)->count();
            
        }else{
            $skk_ormas = SkkOrmas::where('status', 2)->count();
        }
        
		if($skk_ormas>0){
			echo "<small class='label pull-right bg-blue'>".$skk_ormas."</small>";
		} 
    }

    ## Jumlah Data Di Verifikasi
    public function jumlah_data_diverifikasi()
    {
        $skk_ormas = SkkOrmas::where('status', 3)->count();
        
		if($skk_ormas>0){
			echo "<small class='label pull-right bg-blue'>".$skk_ormas."</small>";
		} 
    }
}
