<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Harga extends Model{

    protected $fillable = ['id','harga'];


    public function harga_b (){
        return $this->belongsTo(Barang::class);
    }
}
