<?php

namespace App\Http\Controllers;
use App\Models\BrgKeluar;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Keluar;

use Carbon\Carbon;


use Illuminate\Http\Request;

class BrgKeluarController extends Controller
{
    public function index (){
        $brg_keluar = BrgKeluar::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
        ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
        ->select(['brg_masuk.*', 'kategori.nama_kategori','barang.stok', 'barang.harga',  'barang.nama_barang'])->get();

        $barang = Barang::all ();

        return view ('admin.master.barang.gudang.brg_keluar', compact('brg_keluar','barang'));

    }

    public function create (){
        $barang = Barang::all();
        // $id_barang['id'] = $request->id_barang;
        return view ('admin.master.barang.gudang.brg_keluar.add', compact('barang'));
    }
    public function edit ($id){

        $barang = BrgKeluar::find($id);
        return view('admin.master.barang.gudang.brg_keluar.edit', compact($barang));
    }

    public function store(Request $request){



            $brg = Barang::findOrFail($request->id_barang);
            if($brg->stok < $request->jml_brg_keluar)
            {
                return "barang melebihi stok";
            }else{
                BrgKeluar::create ([
                    'no_brg_keluar' => $request->no_brg_masuk,
                    'id_barang' => $request->id_barang,
                    'id_user' => $request->id_user,
                    'jml_brg_keluar' => $request->jml_brg_masuk,
                    'total' => $request->total,
                    'created_at',
                    'updated_at',

                    ]);
                $brg->stok += $request->jml_brg_masuk;
                $brg->save();

                return redirect();
            }

    }
    public function proses(Request $request){

        // $barang = Barang::find($id);

        // $ajax_barang = Barang::with('barang')->where('id');
        // $ajax_barang = Barang::where('id')->get();

        $id = $request->input('id_barang');
        $barang = Barang::where('id', $id)->pluck("harga","id")->first();
        // $barang = Barang::find('id','harga',$id)->first();
// return $barang->harga;
        // dd($barang);
        return response()->json($barang);}


    public function delete(){


    }

    public function update (Request $request , $id){
        $brg_msk = BrgKeluar::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
        ->find($id);
        // $brg_msk = BrgMsk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
        // ->find($id);

        $brg_msk ->no_brg_masuk= $request->no_brg_masuk;
        $brg_msk ->id_barang =$request->id_barang;
        $brg_msk ->id_user =$request->id_user;
        // $brg_msk ->id_user =$request->harga;
        $brg_msk ->jml_brg_masuk =$request->jml_brg_masuk;
        $brg_msk ->total =$request->total;

        $brg_msk ->created_at = Carbon::today();
        $brg_msk ->updated_at =Carbon::today();




        $brg_msk->save();


        return redirect("/brg_keluar")->with('success','berhasil');
    }
}
