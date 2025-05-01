<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoBuku extends Model
{
    use HasFactory;
    protected $guarded = 'id';
    protected $table = 'toko_bukus';
    protected $casts = ['Link_Marketplace' => 'array'];
    protected $fillable = ['Nama_Toko',  'Link_Marketplace', 'name', 'Alamat','Kontak','deskripsi_toko','Id_seller'];

    public function seller()
    {   
        return $this->belongsTo(Seller::class, 'Id_seller');
    }
}

