<?php

namespace App\Http\Controllers;

use App\Models\Berita;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $berita = Berita::orderBy('id','DESC')->paginate(10);
		return view('admin.berita.index',compact('berita'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $berita = $request->get('search');
        $berita = Berita::
                where(function ($query) use ($berita) {
                    $query->where('judul', 'LIKE', '%'.$berita.'%')
                        ->orWhere('isi', 'LIKE', '%'.$berita.'%');
                })->orderBy('id','DESC')->paginate(10);
		return view('admin.berita.index',compact('berita'));
    }
	
    ## Tampilkan Form Create
    public function create()
    {
		$view=view('admin.berita.create');
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
			'foto' => 'required|mimes:jpg,jpeg,png|max:500'
        ]);

		$input['judul'] = $request->judul;
		$input['isi'] = $request->isi;
		
		if($request->file('foto')){
			$input['foto'] = time().'.'.$request->foto->getClientOriginalExtension();
			$request->foto->move(public_path('upload/berita'), $input['foto']);
    	}	
		
		$input['user_id'] = Auth::user()->id;
		
        Berita::create($input);
		
		return redirect('/berita')->with('status','Data Tersimpan');
    }

    ## Tampilkan Detail
    public function show($id)
    {
        //
    }

    ## Tampilkan Form Edit
    public function edit(Berita $berita)
    {
        $view=view('admin.berita.edit', compact('berita'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Berita $berita)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
			'foto' => 'mimes:jpg,jpeg,png|max:500'
        ]);

        if($request->file('foto') && $berita->foto){
            $pathToYourFile = public_path('upload/berita/'.$berita->foto);
            if(file_exists($pathToYourFile))
            {
                unlink($pathToYourFile);
            }
        }

		$berita->fill($request->all());
		
		if($request->file('foto') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('upload/berita'), $filename);
            $berita->foto = $filename;
		}
		
		$berita->user_id = Auth::user()->id;
			
    	$berita->save();
		
		return redirect('/berita')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Berita $berita)
    {
        
		$pathToYourFile = 'upload/berita_berita/'.$berita->berita;
		if(file_exists($pathToYourFile)) 
		{
			unlink($pathToYourFile); 
		}
			
		$berita->delete();
		
        return redirect('/berita')->with('status', 'Data Berhasil Dihapus');
    }
}
