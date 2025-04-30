<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoBuku extends Model
{
    use HasFactory;
    protected $guarded = 'id';
    protected $table = 'toko_bukus';
    protected $fillable = ['Nama_Toko',  'Marketplace', 'Nama_Seller', 'Alamat','Kontak','deskripsi_toko'];
}
