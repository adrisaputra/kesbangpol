<?php

namespace App\Http\Controllers;

use App\Models\IzinPenelitian;   //nama model
use App\Models\SkkOrmas;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        return view('web.beranda');
    }

    ### Izin Penelitian
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

    public function edit_izin_penelitian(IzinPenelitian $izin_penelitian)
    {
        $title = "Upload Data Pengajuan Izin Penelitian";
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

    public function update_izin_penelitian(Request $request, IzinPenelitian $izin_penelitian)
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

    ### Surat Keterangan Keberadaan Ormas
    public function pengajuan_skk_ormas()
    {
        $title = "Pengajuan Surat Keterangan Keberadaan Ormas";
        $data = SkkOrmas::where('status', 0)->where('user_id', Auth::user()->id)
                ->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);
        return view('web.skk_ormas.index', compact('title','data'));
    }

    public function search_pengajuan_skk_ormas(Request $request)
    {
        $title = "Pengajuan Surat Keterangan Keberadaan Ormas";
        $data = $request->get('search');
        
        $data = SkkOrmas::where('status', 0)->where('user_id', Auth::user()->id)
                ->where('kode', 'LIKE', '%'.$data.'%')
                ->orderBy('skk_ormas_tbl.id','DESC')->paginate(25);
    
        return view('web.skk_ormas.index', compact('title','data'));
    }

    public function buat_pengajuan_skk_ormas()
    {
        $title = "Buat Pengajuan Surat Keterangan Keberadaan Ormas";

        $input['kode'] = 'SKKO-'.date('Ymd').date('His');
		$input['tanggal'] = date('Y-m-d');
		$input['waktu'] = date('H:i:s');
		$input['user_id'] = Auth::user()->id;
		
        SkkOrmas::create($input);

        return redirect('/pengajuan_skk_ormas_w')->with('status','Kode Pengajuan Berhasil Di buat ! Silahkan Upload Laporan Anda...');

    }

    public function edit_skk_ormas(SkkOrmas $skk_ormas)
    {
        $title = "Upload Data Pengajuan Surat Keterangan Keberadaan Ormas";
        $view=view('web.skk_ormas.edit', compact('title','skk_ormas'));
        $view=$view->render();
        return $view;
    }

    public function update_skk_ormas(Request $request, SkkOrmas $skk_ormas)
    {
        if($request->file == 1){
            $this->validate($request, [
                'anggaran_dasar' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 2){
            $this->validate($request, [
                'logo' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 4){
            $this->validate($request, [
                'program_kerja' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 5){
            $this->validate($request, [
                'domisili' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 6){
            $this->validate($request, [
                'kepemilikan' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 7){
            $this->validate($request, [
                'foto_kantor' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 8){
            $this->validate($request, [
                'susunan_pengurus' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 9){
            $this->validate($request, [
                'biodata_ketua' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 10){
            $this->validate($request, [
                'foto_ketua' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 11){
            $this->validate($request, [
                'ktp_ketua' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 12){
            $this->validate($request, [
                'biodata_sekretaris' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 13){
            $this->validate($request, [
                'foto_sekretaris' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 14){
            $this->validate($request, [
                'ktp_sekretaris' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 15){
            $this->validate($request, [
                'biodata_bendahara' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 16){
            $this->validate($request, [
                'foto_bendahara' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 17){
            $this->validate($request, [
                'ktp_bendahara' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 18){
            $this->validate($request, [
                'formulir' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        } else if($request->file == 20){
            $this->validate($request, [
                'surat_pernyataan_permendagri' => 'required|mimes:jpg,jpeg,png,pdf|max:500'
            ]);
        }

        if($skk_ormas->anggaran_dasar && $request->file('anggaran_dasar')!=""){
            $image_path = public_path().'/upload/anggaran_dasar/'.$skk_ormas->anggaran_dasar;
            unlink($image_path);
        }

        if($skk_ormas->logo && $request->file('logo')!=""){
            $image_path = public_path().'/upload/logo/'.$skk_ormas->logo;
            unlink($image_path);
        }

        if($skk_ormas->bendera && $request->file('bendera')!=""){
            $image_path = public_path().'/upload/bendera/'.$skk_ormas->bendera;
            unlink($image_path);
        }

        if($skk_ormas->program_kerja && $request->file('program_kerja')!=""){
            $image_path = public_path().'/upload/program_kerja/'.$skk_ormas->program_kerja;
            unlink($image_path);
        }

        if($skk_ormas->domisili && $request->file('domisili')!=""){
            $image_path = public_path().'/upload/domisili/'.$skk_ormas->domisili;
            unlink($image_path);
        }

        if($skk_ormas->kepemilikan && $request->file('kepemilikan')!=""){
            $image_path = public_path().'/upload/kepemilikan/'.$skk_ormas->kepemilikan;
            unlink($image_path);
        }

        if($skk_ormas->foto_kantor && $request->file('foto_kantor')!=""){
            $image_path = public_path().'/upload/foto_kantor/'.$skk_ormas->foto_kantor;
            unlink($image_path);
        }

        if($skk_ormas->susunan_pengurus && $request->file('susunan_pengurus')!=""){
            $image_path = public_path().'/upload/susunan_pengurus/'.$skk_ormas->susunan_pengurus;
            unlink($image_path);
        }

        if($skk_ormas->biodata_ketua && $request->file('biodata_ketua')!=""){
            $image_path = public_path().'/upload/biodata_ketua/'.$skk_ormas->biodata_ketua;
            unlink($image_path);
        }

        if($skk_ormas->foto_ketua && $request->file('foto_ketua')!=""){
            $image_path = public_path().'/upload/foto_ketua/'.$skk_ormas->foto_ketua;
            unlink($image_path);
        }

        if($skk_ormas->ktp_ketua && $request->file('ktp_ketua')!=""){
            $image_path = public_path().'/upload/ktp_ketua/'.$skk_ormas->ktp_ketua;
            unlink($image_path);
        }

        if($skk_ormas->biodata_sekretaris && $request->file('biodata_sekretaris')!=""){
            $image_path = public_path().'/upload/biodata_sekretaris/'.$skk_ormas->biodata_sekretaris;
            unlink($image_path);
        }

        if($skk_ormas->foto_sekretaris && $request->file('foto_sekretaris')!=""){
            $image_path = public_path().'/upload/foto_sekretaris/'.$skk_ormas->foto_sekretaris;
            unlink($image_path);
        }

        if($skk_ormas->ktp_sekretaris && $request->file('ktp_sekretaris')!=""){
            $image_path = public_path().'/upload/ktp_sekretaris/'.$skk_ormas->ktp_sekretaris;
            unlink($image_path);
        }

        if($skk_ormas->biodata_bendahara && $request->file('biodata_bendahara')!=""){
            $image_path = public_path().'/upload/biodata_bendahara/'.$skk_ormas->biodata_bendahara;
            unlink($image_path);
        }

        if($skk_ormas->foto_bendahara && $request->file('foto_bendahara')!=""){
            $image_path = public_path().'/upload/foto_bendahara/'.$skk_ormas->foto_bendahara;
            unlink($image_path);
        }

        if($skk_ormas->ktp_bendahara && $request->file('ktp_bendahara')!=""){
            $image_path = public_path().'/upload/ktp_bendahara/'.$skk_ormas->ktp_bendahara;
            unlink($image_path);
        }

        if($skk_ormas->formulir && $request->file('formulir')!=""){
            $image_path = public_path().'/upload/formulir/'.$skk_ormas->formulir;
            unlink($image_path);
        }

        if($skk_ormas->rekomendasi && $request->file('rekomendasi')!=""){
            $image_path = public_path().'/upload/rekomendasi/'.$skk_ormas->rekomendasi;
            unlink($image_path);
        }

        if($skk_ormas->surat_pernyataan_permendagri && $request->file('surat_pernyataan_permendagri')!=""){
            $image_path = public_path().'/upload/surat_pernyataan_permendagri/'.$skk_ormas->surat_pernyataan_permendagri;
            unlink($image_path);
        }

        if($skk_ormas->surat_pernyataan_kesediaan && $request->file('surat_pernyataan_kesediaan')!=""){
            $image_path = public_path().'/upload/surat_pernyataan_kesediaan/'.$skk_ormas->surat_pernyataan_kesediaan;
            unlink($image_path);
        }

        $skk_ormas->fill($request->all());
        
		if($request->file('anggaran_dasar') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->anggaran_dasar->getClientOriginalExtension();
            $request->anggaran_dasar->move(public_path('upload/anggaran_dasar'), $filename);
            $skk_ormas->anggaran_dasar = $filename;
		}
		
		if($request->file('logo') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('upload/logo'), $filename);
            $skk_ormas->logo = $filename;
		}
		
		if($request->file('bendera') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->bendera->getClientOriginalExtension();
            $request->bendera->move(public_path('upload/bendera'), $filename);
            $skk_ormas->bendera = $filename;
		}
		
		if($request->file('program_kerja') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->program_kerja->getClientOriginalExtension();
            $request->program_kerja->move(public_path('upload/program_kerja'), $filename);
            $skk_ormas->program_kerja = $filename;
		}
		
		if($request->file('domisili') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->domisili->getClientOriginalExtension();
            $request->domisili->move(public_path('upload/domisili'), $filename);
            $skk_ormas->domisili = $filename;
		}
		
		if($request->file('kepemilikan') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->kepemilikan->getClientOriginalExtension();
            $request->kepemilikan->move(public_path('upload/kepemilikan'), $filename);
            $skk_ormas->kepemilikan = $filename;
		}
		
		if($request->file('foto_kantor') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->foto_kantor->getClientOriginalExtension();
            $request->foto_kantor->move(public_path('upload/foto_kantor'), $filename);
            $skk_ormas->foto_kantor = $filename;
		}
		
		if($request->file('susunan_pengurus') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->susunan_pengurus->getClientOriginalExtension();
            $request->susunan_pengurus->move(public_path('upload/susunan_pengurus'), $filename);
            $skk_ormas->susunan_pengurus = $filename;
		}
		
		if($request->file('biodata_ketua') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->biodata_ketua->getClientOriginalExtension();
            $request->biodata_ketua->move(public_path('upload/biodata_ketua'), $filename);
            $skk_ormas->biodata_ketua = $filename;
		}
		
		if($request->file('foto_ketua') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->foto_ketua->getClientOriginalExtension();
            $request->foto_ketua->move(public_path('upload/foto_ketua'), $filename);
            $skk_ormas->foto_ketua = $filename;
		}
		
		if($request->file('ktp_ketua') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->ktp_ketua->getClientOriginalExtension();
            $request->ktp_ketua->move(public_path('upload/ktp_ketua'), $filename);
            $skk_ormas->ktp_ketua = $filename;
		}
		
		if($request->file('biodata_sekretaris') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->biodata_sekretaris->getClientOriginalExtension();
            $request->biodata_sekretaris->move(public_path('upload/biodata_sekretaris'), $filename);
            $skk_ormas->biodata_sekretaris = $filename;
		}
		
		if($request->file('foto_sekretaris') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->foto_sekretaris->getClientOriginalExtension();
            $request->foto_sekretaris->move(public_path('upload/foto_sekretaris'), $filename);
            $skk_ormas->foto_sekretaris = $filename;
		}
		
		if($request->file('ktp_sekretaris') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->ktp_sekretaris->getClientOriginalExtension();
            $request->ktp_sekretaris->move(public_path('upload/ktp_sekretaris'), $filename);
            $skk_ormas->ktp_sekretaris = $filename;
		}
		
		if($request->file('biodata_bendahara') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->biodata_bendahara->getClientOriginalExtension();
            $request->biodata_bendahara->move(public_path('upload/biodata_bendahara'), $filename);
            $skk_ormas->biodata_bendahara = $filename;
		}
		
		if($request->file('foto_bendahara') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->foto_bendahara->getClientOriginalExtension();
            $request->foto_bendahara->move(public_path('upload/foto_bendahara'), $filename);
            $skk_ormas->foto_bendahara = $filename;
		}
		
		if($request->file('ktp_bendahara') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->ktp_bendahara->getClientOriginalExtension();
            $request->ktp_bendahara->move(public_path('upload/ktp_bendahara'), $filename);
            $skk_ormas->ktp_bendahara = $filename;
		}
		
		if($request->file('formulir') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->formulir->getClientOriginalExtension();
            $request->formulir->move(public_path('upload/formulir'), $filename);
            $skk_ormas->formulir = $filename;
		}
		
		if($request->file('rekomendasi') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->rekomendasi->getClientOriginalExtension();
            $request->rekomendasi->move(public_path('upload/rekomendasi'), $filename);
            $skk_ormas->rekomendasi = $filename;
		}
		
		if($request->file('surat_pernyataan_permendagri') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->surat_pernyataan_permendagri->getClientOriginalExtension();
            $request->surat_pernyataan_permendagri->move(public_path('upload/surat_pernyataan_permendagri'), $filename);
            $skk_ormas->surat_pernyataan_permendagri = $filename;
		}
		
		if($request->file('surat_pernyataan_kesediaan') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->surat_pernyataan_kesediaan->getClientOriginalExtension();
            $request->surat_pernyataan_kesediaan->move(public_path('upload/surat_pernyataan_kesediaan'), $filename);
            $skk_ormas->surat_pernyataan_kesediaan = $filename;
		}
		
    	$skk_ormas->save();
		
        if($request->status==1){
		    return redirect('/pengajuan_skk_ormas_w')->with('status', 'Pengajuan Di Kirim !');
        } else {
            if(request()->segment(2)=='edit'){
                return redirect('/pengajuan_skk_ormas_w/edit/'.$skk_ormas->id)->with('status', 'File Berhasil Di Simpan !');
            } else {
                return redirect('/pengajuan_skk_ormas_w/perbaikan/'.$skk_ormas->id)->with('status', 'File Berhasil Di Simpan !');
            }
        }
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
