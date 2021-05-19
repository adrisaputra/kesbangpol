<?php

namespace App\Http\Controllers;

use App\Models\IzinPenelitian;   //nama model
use App\Models\SkkOrmas;   //nama model
use App\Models\SktOrmas;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
        if(Auth::user()->group==2){
            $izin_perizinan = IzinPenelitian::where('status', 1)->count();
            $skk_ormas = SkkOrmas::where('status', 1)->count();
            $skt_ormas = SktOrmas::where('status', 1)->count();
        } else {
            $izin_perizinan = IzinPenelitian::where('status', 2)->count();
            $skk_ormas = SkkOrmas::where('status', 2)->count();
            $skt_ormas = SktOrmas::where('status', 2)->count();
        }
        return view('admin.beranda', compact('izin_perizinan','skk_ormas','skt_ormas'));
    }
}
