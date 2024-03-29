<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $fillable = [
        'nama_kategori',
        'created_at',
        'updated_at'

    ];
    protected $guarded = [];

    protected $hidden = [
        'password',

    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
