<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        // $hitung =User::count();
        // menghitung jumlah
        return view ('admin.master.user.user', compact('user'));
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

    public function changestatus(Request $request)

    {

        $user = User::find($request->id);

        $user->status = $request->status;

        $user->save();

        return response()->json(['success'=>'Status change successfully.']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'level' =>$request->level,
            'status'=>$request->status,
            'created_at' =>$request->created_at,
            'updated_at' =>$request->updated_at,



        ]);
        return redirect('/user')->with('success','berhasil');
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
    public function status(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>'Status change successfully.']);
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
        $user = User::find($id);

           $user ->name= $request->name;
           $user ->email =$request->email;
           $user ->password = Hash::make($request->password);
           $user ->level =$request->level;
           $user ->created_at =$request->created_at;
           $user ->updated_at =$request->updated_at;
           $user->save();
           return redirect("/user")->with('success','berhasil');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success','berhasil');

    }
}
