<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\kategori;


use Illuminate\Http\Request;
use Kategori as GlobalKategori;

class KategoriController extends Controller
{

   public function index()
    {
        $kategori = Kategori::all();
        return view ('admin.master.kategori.kategori', compact('kategori'));
    }



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
        Kategori::create([
            'nama_kategori' =>$request->nama_kategori,




        ]);
        return redirect('/kategori')->with('success','berhasil');
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
        $kategori = kategori::find($id);

           $kategori ->nama_kategori= $request->nama_kategori;

           $kategori ->created_at =$request->created_at;
           $kategori ->updated_at =$request->updated_at;
           $kategori->save();
           return redirect("/kategori")->with('success','berhasil');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategori')->with('success','berhasil');

    }
}
