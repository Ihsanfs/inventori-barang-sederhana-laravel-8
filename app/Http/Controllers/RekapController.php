<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BrgKeluar;
use App\Models\BrgMsk;
use App\Models\User;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index(){
        $brg = Barang::all();
        $barang = Barang::count();

        $brgkeluar = BrgKeluar::count();

        $date = date('Y-m-d');
        $tglmsk = BrgMsk::where('created_at', '=' ,$date)->count();
        $tglkl = BrgKeluar::where('created_at', '=' ,$date)->count();

        $jan = BrgMsk::whereMonth('created_at', '01')->count();
        $feb = BrgMsk::whereMonth('created_at', '02')->count();
        $mar = BrgMsk::whereMonth('created_at', '03')->count();
        $apr = BrgMsk::whereMonth('created_at', '04')->count();
        $mei = BrgMsk::whereMonth('created_at', '05')->count();
        $jun = BrgMsk::whereMonth('created_at', '06')->count();
        $jul = BrgMsk::whereMonth('created_at', '07')->count();
        $agu = BrgMsk::whereMonth('created_at', '08')->count();
        $sep = BrgMsk::whereMonth('created_at', '09')->count();
        $okt = BrgMsk::whereMonth('created_at', '10')->count();
        $nov = BrgMsk::whereMonth('created_at', '11')->count();
        $des = BrgMsk::whereMonth('created_at', '12')->count();


        $ja = BrgKeluar::whereMonth('created_at', '01')->count();
        $fe = BrgKeluar::whereMonth('created_at', '02')->count();
        $ma = BrgKeluar::whereMonth('created_at', '03')->count();
        $ap = BrgKeluar::whereMonth('created_at', '04')->count();
        $me = BrgKeluar::whereMonth('created_at', '05')->count();
        $ju = BrgKeluar::whereMonth('created_at', '06')->count();
        $ju = BrgKeluar::whereMonth('created_at', '07')->count();
        $ag = BrgKeluar::whereMonth('created_at', '08')->count();
        $se = BrgKeluar::whereMonth('created_at', '09')->count();
        $ok = BrgKeluar::whereMonth('created_at', '10')->count();
        $no = BrgKeluar::whereMonth('created_at', '11')->count();
        $de = BrgKeluar::whereMonth('created_at', '12')->count();

        // dd($brgmsk,$brgkeluar,$tglmsk);
        return view ('admin.rekap.index', compact('tglmsk',
        'barang',
        'brg',
            'jan',
            'feb',
            'mar',
            'apr',
            'mei',
            'jun',
            'jul',
            'agu',
            'sep',
            'okt',
            'nov',
            'des',
            'ja',
            'fe',
            'ma',
            'ap',
            'me',
            'ju',
            'ju',
            'ag',
            'se',
            'ok',
            'no',
            'de',
            'tglkl'
    ));
    }
}
