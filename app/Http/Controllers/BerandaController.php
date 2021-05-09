<?php

namespace App\Http\Controllers;

use App\Models\IzinPenelitian;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        return view('web.beranda');
    }

    public function pengajuan_izin_penelitian()
    {
        $title = "Pengajuan Izin Penelitian";
        $data = IzinPenelitian::where('status', 0)->where('user_id', Auth::user()->id)
                ->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);
        return view('web.izin_penelitian.index', compact('title','data'));
    }

    public function search_pengajuan_izin_penelitian(Request $request)
    {
        $title = "Pengajuan Izin Penelitian";
        $data = $request->get('search');
        
        $data = IzinPenelitian::where('status', 0)->where('user_id', Auth::user()->id)
                ->where('kode', 'LIKE', '%'.$data.'%')
                ->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);
    
        return view('web.izin_penelitian.index', compact('title','data'));
    }
      
    public function status_izin_penelitian()
    {
        $title = "Status Izin Penelitian";
        $data = IzinPenelitian::
                where(function ($query) {
                    $query->where('izin_penelitian_tbl.status',1)
                        ->orWhere('izin_penelitian_tbl.status',2)
                        ->orWhere('izin_penelitian_tbl.status',3)
                        ->orWhere('izin_penelitian_tbl.status',4)
                        ->orWhere('izin_penelitian_tbl.status',5);
                })->where('user_id', Auth::user()->id)
                ->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);
        return view('web.izin_penelitian.index', compact('title','data'));
    }

    public function search_status_izin_penelitian(Request $request)
    {
        $title = "Status Izin Penelitian";
        $data = $request->get('search');

        $data = IzinPenelitian::
                where(function ($query) {
                    $query->where('izin_penelitian_tbl.status',1)
                        ->orWhere('izin_penelitian_tbl.status',2)
                        ->orWhere('izin_penelitian_tbl.status',3)
                        ->orWhere('izin_penelitian_tbl.status',4)
                        ->orWhere('izin_penelitian_tbl.status',5);
                })
                ->where('kode', 'LIKE', '%'.$data.'%')
                ->where('user_id', Auth::user()->id)
                ->orderBy('izin_penelitian_tbl.id','DESC')->paginate(25);

        return view('web.izin_penelitian.index', compact('title','data'));
    }
      
    public function buat_pengajuan_izin_penelitian()
    {
        $title = "Buat Pengajuan Izin Penelitian";

        $input['kode'] = 'IP-'.date('Ymd').date('His');
		$input['tanggal'] = date('Y-m-d');
		$input['waktu'] = date('H:i:s');
		$input['user_id'] = Auth::user()->id;
		
        IzinPenelitian::create($input);

        return redirect('/pengajuan_izin_penelitian_w')->with('status','Kode Pengajuan Berhasil Di buat ! Silahkan Upload Laporan Anda...');

    }

    public function edit(IzinPenelitian $izin_penelitian)
    {
        $title = "Masukkan Data";
        $view=view('web.izin_penelitian.edit', compact('title','izin_penelitian'));
        $view=$view->render();
        return $view;
    }

    public function perbaikan(IzinPenelitian $izin_penelitian)
    {
        $title = "Perbaiki Data";
        $view=view('web.izin_penelitian.perbaikan', compact('title','izin_penelitian'));
        $view=$view->render();
        return $view;
    }

    public function update(Request $request, IzinPenelitian $izin_penelitian)
    {
        if($request->file == 1){
            $this->validate($request, [
                'surat_perguruan_tinggi' => 'required|mimes:pdf|max:500'
            ]);
        } else if($request->file == 2){
            $this->validate($request, [
                'proposal_penelitian' => 'required|mimes:pdf|max:500'
            ]);
        } else if($request->file == 3){
            $this->validate($request, [
                'ktp_peneliti' => 'required|mimes:pdf|max:500'
            ]);
        } else if($request->file == 4){
            $this->validate($request, [
                'izin_penelitian' => 'required|mimes:pdf|max:500'
            ]);
        }
        

        if($izin_penelitian->surat_perguruan_tinggi && $request->file('surat_perguruan_tinggi')!=""){
            $image_path = public_path().'/upload/surat_perguruan_tinggi/'.$izin_penelitian->surat_perguruan_tinggi;
            unlink($image_path);
        }

        if($izin_penelitian->proposal_penelitian && $request->file('proposal_penelitian')!=""){
            $image_path = public_path().'/upload/proposal_penelitian/'.$izin_penelitian->proposal_penelitian;
            unlink($image_path);
        }

        if($izin_penelitian->ktp_peneliti && $request->file('ktp_peneliti')!=""){
            $image_path = public_path().'/upload/ktp_peneliti/'.$izin_penelitian->ktp_peneliti;
            unlink($image_path);
        }

        if($izin_penelitian->izin_penelitian && $request->file('izin_penelitian')!=""){
            $image_path = public_path().'/upload/izin_penelitian/'.$izin_penelitian->izin_penelitian;
            unlink($image_path);
        }

        $izin_penelitian->fill($request->all());
        
		if($request->file('surat_perguruan_tinggi') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->surat_perguruan_tinggi->getClientOriginalExtension();
            $request->surat_perguruan_tinggi->move(public_path('upload/surat_perguruan_tinggi'), $filename);
            $izin_penelitian->surat_perguruan_tinggi = $filename;
		}
		
		if($request->file('proposal_penelitian') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->proposal_penelitian->getClientOriginalExtension();
            $request->proposal_penelitian->move(public_path('upload/proposal_penelitian'), $filename);
            $izin_penelitian->proposal_penelitian = $filename;
		}
		
		if($request->file('ktp_peneliti') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->ktp_peneliti->getClientOriginalExtension();
            $request->ktp_peneliti->move(public_path('upload/ktp_peneliti'), $filename);
            $izin_penelitian->ktp_peneliti = $filename;
		}
		
		if($request->file('izin_penelitian') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->izin_penelitian->getClientOriginalExtension();
            $request->izin_penelitian->move(public_path('upload/izin_penelitian'), $filename);
            $izin_penelitian->izin_penelitian = $filename;
		}
		
    	$izin_penelitian->save();
		
        if($request->status==1){
		    return redirect('/pengajuan_izin_penelitian_w')->with('status', 'Pengajuan Di Kirim !');
        } else {
            if(request()->segment(2)=='edit'){
                return redirect('/pengajuan_izin_penelitian_w/edit/'.$izin_penelitian->id)->with('status', 'File Berhasil Di Simpan !');
            } else {
                return redirect('/pengajuan_izin_penelitian_w/perbaikan/'.$izin_penelitian->id)->with('status', 'File Berhasil Di Simpan !');
            }
        }
    }

    public function detail(IzinPenelitian $izin_penelitian)
    {
        $title = "Status Izin Penelitian";
        $view=view('web.izin_penelitian.detail', compact('title','izin_penelitian'));
        $view=$view->render();
        return $view;
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'surat_perguruan_tinggi' => 'required|mimes:jpg,jpeg,png,pdf|max:500',
            'proposal_penelitian' => 'required|mimes:jpg,jpeg,png,pdf|max:500',
            'ktp_peneliti' => 'required|mimes:jpg,jpeg,png,pdf|max:500',
            'izin_penelitian' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
        ]);

        if($request->file('surat_perguruan_tinggi')){
            $input['surat_perguruan_tinggi'] = time().'.'.$request->surat_perguruan_tinggi->getClientOriginalExtension();
            $request->surat_perguruan_tinggi->move(public_path('upload/surat_perguruan_tinggi'), $input['surat_perguruan_tinggi']);
        }	
        
        if($request->file('proposal_penelitian')){
            $input['proposal_penelitian'] = time().'.'.$request->proposal_penelitian->getClientOriginalExtension();
            $request->proposal_penelitian->move(public_path('upload/proposal_penelitian'), $input['proposal_penelitian']);
        }	
        
        if($request->file('ktp_peneliti')){
            $input['ktp_peneliti'] = time().'.'.$request->ktp_peneliti->getClientOriginalExtension();
            $request->ktp_peneliti->move(public_path('upload/ktp_peneliti'), $input['ktp_peneliti']);
        }	
        
        if($request->file('izin_penelitian')){
            $input['izin_penelitian'] = time().'.'.$request->izin_penelitian->getClientOriginalExtension();
            $request->izin_penelitian->move(public_path('upload/izin_penelitian'), $input['izin_penelitian']);
        }	
        
		$input['kode'] = 'IP-'.date('Ymd').date('His');
		$input['tanggal'] = date('Y-m-d');
		$input['waktu'] = date('H:i:s');
		$input['user_id'] = Auth::user()->id;
		
        IzinPenelitian::create($input);
		
		return redirect('/pengajuan_izin_penelitian_w')->with('status','Permohonan Terkirim');
    }

    public function login()
    {
        $title = "Login";
        return view('web.login', compact('title'));
    }

    public function registrasi()
    {
        $title = "Registrasi";
        return view('web.registrasi', compact('title'));
    }

}
