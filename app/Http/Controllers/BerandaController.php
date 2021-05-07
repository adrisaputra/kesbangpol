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
        $data = IzinPenelitian::where('user_id', Auth::user()->id)->paginate(1);
        return view('web.pengajuan_izin_penelitian', compact('title','data'));
    }

    public function buat_pengajuan_izin_penelitian()
    {
        $title = "Buat Pengajuan Izin Penelitian";
        return view('web.buat_pengajuan_izin_penelitian', compact('title'));
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
