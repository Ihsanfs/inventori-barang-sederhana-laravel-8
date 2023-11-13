<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\kategori;
use App\Models\BrgMsk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Resources\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Redirect;
use Harga;
use Carbon\Carbon;
use Kategori as GlobalKategori;

class BrgMskController extends Controller
{
    public function index(){
        $brg_msk = BrgMsk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
        ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
        ->select(['brg_masuk.*', 'kategori.nama_kategori','barang.stok', 'barang.harga',  'barang.nama_barang'])->get();

        $barang = Barang::all ();


        return view ('admin.master.barang.gudang.brg_msk.brg_msk', compact('brg_msk','barang'));
        // return view ('admin.master.barang.barang', compact('brg_msk','barang'));


    }

    public function hitung(){


    }

    public function create(){
        $barang = Barang::all();

        $o = DB::table('brg_masuk')
        ->select(DB::raw('MAX(RIGHT(no_brg_masuk,4)) as kode'));
        $kd = "";
        if($o->count()>0){

            foreach($o->get() as $k){
                $tmp = ((int)$k->kode+1);
                $kd = date('d-m-Y').'-'.sprintf("%04s",$tmp);
            }

        }else{

            $kd = "001";
        }
        // $id_barang['id'] = $request->id_barang;
        return view ('admin.master.barang.gudang.brg_msk.add', compact('barang','kd'));
    }

    public function proses(Request $request){

        // $barang = Barang::find($id);

        // $ajax_barang = Barang::with('barang')->where('id');
        // $ajax_barang = Barang::where('id')->get();

        $id = $request->input('id_barang');
        $barang = Barang::where('id', $id)->pluck("harga","id")->first();
        return response()->json($barang);



        //   $barang;




        // return view ('admin.master.barang.gudang.brg_msk.add', compact('barang'));
        // return view ('admin.master.barang.gudang.brg_msk.ajax',compact('barang'));
//  dd($barang->harga);
//       return view ('admin.master.barang.gudang.brg_msk.add', compact('ajax_barang'));
        // abort_unless(\::allows('city_access'), 401);

        // if (!$request->id_barang) {
        //     $html = '<option value="">'.trans('global.pleaseSelect').'</option>';
        // } else {
        //     $html = '';
        //     $cities = Barang::where('id', $request->id_barang)->get();
        //     foreach ($cities as $city) {
        //         $html .= '<option value="'.$city->id.'">'.$city->name.'</option>';
        //     }
        // }
        // return response()->json(['html' => $html]);
        // // $select_value = $request->input('id');

        // // $data = DB::table('barang')->where('id', $select_value)->first();

        // return response()->json(['barang' => $data]);



    }

public function destroy($id){
   $kategori = BrgMsk::find($id);
        $kategori->delete();
        return redirect('/brg_msk')->with('success','berhasil');
}
    public function store(Request $request){
        BrgMsk::create ([
        'no_brg_masuk' => $request->no_brg_masuk,
        'id_barang' => $request->id_barang,
        'id_user' => $request->id_user,
        'jml_brg_masuk' => $request->jml_brg_masuk,
        'tgl_masuk' => Carbon::now(),
        'total' => $request->total,
        'created_at',
        'updated_at',

        ]);


        $brg = Barang::findOrFail($request->id_barang);
        $brg->stok += $request->jml_brg_masuk;
        $brg->save();

        // dd($brg);
        return redirect('/brg_msk')->with('success','barang berhasil di tambahkan');
}

    public function update(Request $request,$id){


        $brg = BrgMsk::find($id);


        $b = Barang::find($brg->id_barang);
        $b->stok -=$brg->jml_brg_masuk;
        $b->stok +=$request->jml_brg_masuk;
        $b->harga =$request->harga;
        // $b->total =$request->total;
        $b->save();

        $brg->id_barang = $request->id_barang;
        $brg->jml_brg_masuk = $request->jml_brg_masuk;
        $brg->total = $request->total;
        $brg->save();
        // dd($brg);

        // $brg_msk = BrgMsk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
        // ->find($id);
        // // $brg_msk = BrgMsk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
        // // ->find($id);
        // $total = Barang::findOrFail($brg_msk->id_barang);

        // $brg_msk ->no_brg_masuk= $request->no_brg_masuk;
        // $brg_msk ->id_barang =$request->id_barang;
        // $brg_msk ->id_user =$request->id_user;
        // // $brg_msk ->id_user =$request->harga;
        // // $brg_msk ->jml_brg_masuk = $request->jml_brg_masuk;
        // $brg_msk->stok -=$brg_msk->jml_brg_masuk;
        // $brg_msk->stok +=$req->jml_brg_masuk;

        // $brg_msk ->total =$request->total;

        // $brg_msk ->updated_at =Carbon::today();

        // $brg_msk->save();

        // $d = BrgMsk::find($id);
        // $total->stok -= $d->jml_brg_masuk;
        // $total->stok += $request->jml_brg_masuk;
        // $total->save();

        //     $d->id_barang = $request->id_barang;
        //     $d->jml_brg_masuk = $request->jml_brg_masuk;
        //     $d->save();
        return redirect("/brg_msk")->with('success','berhasil');

    }



    public function show(Request $request,$id){

        // $brg_msk = BrgMsk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang',)
        // ->find($id);
        $brg_msk = BrgMsk::find($id);
        // dd($brg_msk);
        $brg = Barang::find($brg_msk->id_barang);

        // $brg_msk = DB::table('brg_msk')->where('id', $id)->get();
        return view('admin.master.barang.gudang.brg_msk.edit',compact('brg_msk','brg'));
    }


    public function edit ($id){
// $brg_msk = DB::table('brg_masuk')->select('id')->where('id', '=', $id)->get()->pluck('users_id')->toArray();
        // $brg_msk= BrgMsk::find($id);

        // $brg_masuk = $brg_masuk->fresh('id_barang');
        $brg_msk = BrgMsk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang',)
        ->find($id);


        // $brg_msk = DB::table('brg_msk')->where('id', $id)->get();
        return view('admin.master.barang.gudang.brg_msk.edit',compact('brg_msk'));

        // return redirect ('admin.master.barang.gudang.brg_msk.edit', compact('tampilkan','id'));
    }
}

