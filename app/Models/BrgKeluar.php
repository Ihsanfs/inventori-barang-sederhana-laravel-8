<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrgKeluar extends Model
{
    use HasFactory;
    protected $table = "brg_keluar";
    protected $fillable = [
        'id_kategori',
        'no_brg_keluar',
        'id_barang',
        'id_user',
        'jml_brg_keluar',

        'total',
        'created_at',
        'updated_at'

    ];


    public function brg_kel()
    {
        return $this->belongsTo(Barang::class);
    }

}
