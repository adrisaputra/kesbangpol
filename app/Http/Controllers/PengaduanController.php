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
    	$pengaduan = Pengaduan::select('pengaduan_tbl.*','users.name','users.email')
                    ->leftjoin('users', 'users.id', '=', 'pengaduan_tbl.user_id')->orderBy('id','DESC')->paginate(10);
		return view('admin.pengaduan.index',compact('pengaduan'));
 
    }
	
	## Tampilkan Data Search
	public function search(Request $request)
    {
        $pesan = $request->get('search');
        $pengaduan = Pengaduan::where('pesan', 'LIKE', '%'.$pesan.'%')->orderBy('id','DESC')->paginate(10);
		return view('admin.pengaduan.index',compact('pengaduan'));
    }
	
    ## Tampilkan Form Edit
    public function edit(Pengaduan $pengaduan)
    {
        $title = 'Lihat Pengaduan';
        $pengaduanx = DB::table('pengaduan_tbl')->select('pengaduan_tbl.*','users.name','users.email')
                    ->leftjoin('users', 'users.id', '=', 'pengaduan_tbl.user_id')
                    ->where('pengaduan_tbl.id',$pengaduan->id)
                    ->orderBy('pengaduan_tbl.id','DESC')->get()->toArray();

        $pengaduan->status = 1;
        $pengaduan->save();

        $view=view('admin.pengaduan.edit', compact('pengaduanx','title'));
        $view=$view->render();
        return $view;
    }
      
	## Hapus Data
	public function delete($pengaduan)
    {
		DB::table('pengaduan_tbl')->where('id',$pengaduan)->delete();
		return redirect('/pengaduan')->with('status','Data Berhasil Dihapus');
    }
}
