<?php

namespace App\Http\Controllers;

use App\Models\Foto;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $foto = Foto::orderBy('id','DESC')->paginate(10);
		return view('admin.foto.index',compact('foto'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $foto = $request->get('search');
        $foto = Foto::where('user_id',Auth::user()->id)->where('judul', 'LIKE', '%'.$foto.'%')->orderBy('id','DESC')->paginate(10);
		return view('admin.foto.index',compact('foto'));
    }
	
    ## Tampilkan Form Create
    public function create()
    {
		$view=view('admin.foto.create');
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
			'gambar' => 'required|mimes:jpg,jpeg,png'
        ]);

		$input['judul'] = $request->judul;
		
		if($request->file('gambar')){
			$input['gambar'] = time().'.'.$request->gambar->getClientOriginalExtension();
			$request->gambar->move(public_path('upload/foto'), $input['gambar']);
    	}	
		
		$input['user_id'] = Auth::user()->id;
		
        Foto::create($input);
		
		return redirect('/foto')->with('status','Data Tersimpan');
    }

    ## Tampilkan Detail
    public function show($id)
    {
        //
    }

    ## Tampilkan Form Edit
    public function edit(Foto $foto)
    {
        $view=view('admin.foto.edit', compact('foto'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Foto $foto)
    {
        $this->validate($request, [
            'judul' => 'required',
			'gambar' => 'mimes:jpg,jpeg,png'
        ]);

		$foto->fill($request->all());
		
		if($request->file('gambar') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('upload/foto'), $filename);
            $foto->gambar = $filename;
		}
		
		$foto->user_id = Auth::user()->id;
			
    	$foto->save();
		
		return redirect('/foto')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Foto $foto)
    {
        $id = $foto->id;
		$foto->delete();
		
		$pathToYourFile = 'upload/foto_foto/'.$foto->foto;
		if(file_exists($pathToYourFile)) 
		{
			unlink($pathToYourFile); 
		}
			
        return redirect('/foto')->with('status', 'Data Berhasil Dihapus');
    }
}
