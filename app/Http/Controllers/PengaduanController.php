<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    ## Tampikan Data
    public function index()
    {
    	$pengaduan = DB::table('pengaduan_tbl')->orderBy('id','DESC')->paginate(10);
		return view('admin.pengaduan.index',compact('pengaduan'));
 
    }
	
	## Tampilkan Data Search
	public function search(Request $request)
    {
        $pesan = $request->get('search');
        $pengaduan = Pengaduan::where('pesan', 'LIKE', '%'.$pesan.'%')->orderBy('id','DESC')->paginate(10);
		return view('admin.pengaduan.index',compact('pengaduan'));
    }
	
    ## Simpan Data
	public function store(Request $request)
    {
		
    	$this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'subjek' => 'required',
            'pesan' => 'required',
            'captcha' => 'required|captcha'
        ]);

		$input['nama'] = $request->nama;
		$input['email'] = $request->email;
		$input['subjek'] = $request->subjek;
		$input['pesan'] = $request->pesan;
		
        Pengaduan::create($input);
		
		return redirect('/')->with('status','Pesan Terkirim');

    }
	
	## Hapus Data
	public function delete($pengaduan)
    {
		DB::table('pengaduan_tbl')->where('id',$pengaduan)->delete();
		return redirect('/pengaduan')->with('status','Data Berhasil Dihapus');
    }
}
