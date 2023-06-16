<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::leftjoin('kategori', 'kategori.id', '=', 'barang.id_kategori')
        ->select(['barang.*', 'kategori.nama_kategori'])->get();

        // $barang = DB::table('barang')
        //     ->Join('kategori', 'kategori.id', '=', 'barang.id_kategori')->select(['barang.*', 'kategori.nama_kategori'])
        //     ->get();

        $kategori = Kategori::all();
        return view ('admin.master.barang.barang', compact('barang','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Barang::create([
            'id_kategori' =>$request->id_kategori,
            'nama_barang' =>$request->nama_barang,
            'harga' =>$request->harga,
            'stok' =>$request->stok

        ]);
        return redirect('/barang')->with('success','berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

           $barang ->id_kategori= $request->id_kategori;
           $barang ->nama_barang =$request->nama_barang;
           $barang ->harga =$request->harga;
           $barang ->stok =$request->stok;
           $barang ->created_at =$request->created_at;
           $barang ->updated_at =$request->updated_at;
           $barang->save();
           return redirect("/barang")->with('success','berhasil');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang')->with('success','berhasil');

    }
}
