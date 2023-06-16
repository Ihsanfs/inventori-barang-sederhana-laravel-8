<?php

namespace App\Http\Controllers;

use App\Models\BrgKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BrgKeluarController extends Controller
{
    public function index()
    {
        $brg_keluar = BrgKeluar::join('barang', 'barang.id', '=', 'brg_keluar.id_barang')
        ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
        ->select(['brg_keluar.*', 'kategori.nama_kategori', 'barang.stok', 'barang.harga',  'barang.nama_barang'])->get();

    $barang = Barang::all();

    return view('admin.master.barang.gudang.brg_keluar.brg_keluar', compact('brg_keluar', 'barang'));
        // $brg_keluar = BrgKeluar::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
        //     ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
        //     ->select(['brg_masuk.*', 'kategori.nama_kategori', 'barang.stok', 'barang.harga',  'barang.nama_barang'])->get();

        // $barang = Barang::all();

        // return view('admin.master.barang.gudang.brg_keluar', compact('brg_keluar', 'barang'));
    }
    public function create(){
        $barang = Barang::all();
        // $id_barang['id'] = $request->id_barang;
        return view ('admin.master.barang.gudang.brg_keluar.add', compact('barang'));
    }
    public function show($id)
    {
        $barang = BrgKeluar::find($id);
        $brg = Barang::find($barang->id_barang);

        return view('admin.master.barang.gudang.brg_keluar.edit', compact('barang','brg'));
        // dd($barang);
    }

        public function proses (Request $request){
            $id = $request->input('id_barang');
            $barang = Barang::where('id', $id)->pluck("harga","id")->first();
            return response()->json($barang);
        }
    public function store(Request $request)
    {
        $brg = Barang::findOrFail($request->id_barang);
        if ($brg->stok < $request->jml_brg_keluar) {
            return "barang melebihi stok";
        } else {
            BrgKeluar::create([
                'no_brg_keluar' => $request->no_brg_keluar,
                'id_barang' => $request->id_barang,
                'id_user' => $request->id_user,
                'jml_brg_keluar' => $request->jml_brg_keluar,
                'total' => $request->total,
                'created_at',
                'updated_at',

            ]);
            $brg->stok -= $request->jml_brg_keluar;
            $brg->save();

            return redirect('/brg_keluar')->with('success','barang berhasil di tambahkan');
        }
    }
    public function update(Request $request, $id)
    {

        $brg = BrgKeluar::find($id);


        $b = Barang::find($brg->id_barang);
        $b->stok -=$brg->jml_brg_keluar;
        $b->stok +=$request->jml_brg_keluar;
        $b->harga =$request->harga;
        // $b->total =$request->total;
        $b->save();

        $brg->id_barang = $request->id_barang;
        $brg->jml_brg_keluar = $request->jml_brg_keluar;
        $brg->total = $request->total;
        $brg->save();

        return redirect('/brg_keluar')->with('success','barang berhasil di update');


    }

    public function delete()
    {
    }


    public function edit($id)
    {

        dd($id);

        // $keluar = BrgKeluar::find($id);

        // dd($keluar);
        // return view ('/brg_keluar',compact('keluar'));
    }
}
