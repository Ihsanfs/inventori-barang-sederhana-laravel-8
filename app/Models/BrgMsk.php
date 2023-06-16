<?php

namespace App\Models;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrgMsk extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "brg_masuk";
    protected $guard= [];
    protected  $primaryKey = 'id';
    protected $fillable = [
        'id',
        'no_brg_masuk',
        'id_barang',
        'id_user',
        'jml_brg_masuk',
        'total',
        'created_at',
        'updated_at'

    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    // public function harga_barang(){
    //     return $this->belongsTo('App\Barang', 'id');
    // }

}
// $sum_one = \App\Models\Barang::whereType(0)->sum('jml_brg_masuk');
