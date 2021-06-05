<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $dokumen = Dokumen::orderBy('id','DESC')->paginate(10);
		return view('admin.dokumen.index',compact('dokumen'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $dokumen = $request->get('search');
        $dokumen = Dokumen::where('user_id',Auth::user()->id)->where('judul', 'LIKE', '%'.$dokumen.'%')->orderBy('id','DESC')->paginate(10);
		return view('admin.dokumen.index',compact('dokumen'));
    }
	
    ## Tampilkan Form Create
    public function create()
    {
		$view=view('admin.dokumen.create');
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
			'dokumen' => 'required|mimes:pdf|max:500'
        ]);

		$input['judul'] = $request->judul;
		
		if($request->file('dokumen')){
			$input['dokumen'] = time().'.'.$request->dokumen->getClientOriginalExtension();
			$request->dokumen->move(public_path('upload/dokumen'), $input['dokumen']);
    	}	
		
		$input['user_id'] = Auth::user()->id;
		
        Dokumen::create($input);
		
		return redirect('/dokumen')->with('status','Data Tersimpan');
    }

    ## Tampilkan Detail
    public function show($id)
    {
        //
    }

    ## Tampilkan Form Edit
    public function edit(Dokumen $dokumen)
    {
        $view=view('admin.dokumen.edit', compact('dokumen'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Dokumen $dokumen)
    {
        $this->validate($request, [
            'judul' => 'required',
			'dokumen' => 'mimes:pdf|max:500'
        ]);

        if($request->file('dokumen') && $dokumen->dokumen){
            $pathToYourFile = public_path('upload/dokumen/'.$dokumen->dokumen);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
        }

		$dokumen->fill($request->all());
		
		if($request->file('dokumen') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->dokumen->getClientOriginalExtension();
            $request->dokumen->move(public_path('upload/dokumen'), $filename);
            $dokumen->dokumen = $filename;
		}
		
		$dokumen->user_id = Auth::user()->id;
			
    	$dokumen->save();
		
		return redirect('/dokumen')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Dokumen $dokumen)
    {
		$pathToYourFile = 'upload/dokumen_dokumen/'.$dokumen->dokumen;
		if(file_exists($pathToYourFile)) 
		{
			unlink($pathToYourFile); 
		}
			
		$dokumen->delete();
		
        return redirect('/dokumen')->with('status', 'Data Berhasil Dihapus');
    }
}
