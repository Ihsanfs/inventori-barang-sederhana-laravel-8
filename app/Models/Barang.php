<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    // protected  $primaryKey = 'id';
    protected $guard= [];

    protected $fillable = [
        'id',
        'id_kategori',
        'nama_barang',
        'harga',
        'stok',
        'created_at',
        'updated_at'

    ];



    public function brgmsk()
    {
        return $this->hasMany(BrgMsk::class);
    }

    public function brgklr()
    {
        return $this->hasMany(BrgKeluar::class);
    }
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
