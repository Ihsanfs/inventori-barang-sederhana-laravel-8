<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BrgKeluar;
use App\Models\BrgMsk;
use App\Models\Kategori;

use App\Models\User;
use Illuminate\Http\Request;


class RekapController extends Controller
{
    public function index(){
        $brg = Barang::all();
        $barang = Barang::count();

        $brgkeluar = BrgKeluar::count();

        $date = date('Y-m-d');
        // $tglmsk = BrgMsk::whereday('created_at')->count();
        $tglmsk = BrgMsk::whereDay('created_at', now()->day)->count();

        $tglkl = BrgKeluar::whereDay('created_at', now()->day)->count();

        // dd($tglkl);
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

    public function masuk() {
        $total_brg_masuk = BrgMsk::sum('jml_brg_masuk');

        return response()->json(['jml_brg_masuk' => $total_brg_masuk]);
    }

    public function keluar() {
        $total_brg_keluar = BrgKeluar::sum('jml_brg_keluar');

        return response()->json(['jml_brg_keluar' => $total_brg_keluar]);
    }

    public function kategori_hitung() {
        $total_kategoris = Kategori::count();
        return response()->json(['total_kategoris' => $total_kategoris]);
    }

    public function user_hitung() {
        $total_user = User::count();
        return response()->json(['total_user' => $total_user]);
    }

    public function hitung_barang() {
        $total_barang = Barang::count();
        return response()->json(['total_barang' => $total_barang]);
    }

}
