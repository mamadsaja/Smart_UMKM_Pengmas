<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    //test

    public function tokoBuku()
    {
        return $this->belongsTo(TokoBuku::class, 'toko_buku_id');
    }
}
