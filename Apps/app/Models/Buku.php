<?php

namespace App\Models;

use Filament\Forms\Components\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['toko_buku_id', 'judul', 'penulis', 'penerbit', 'tahun_terbit', 'harga', 'stok', 'deskripsi', 'gambar', 'kategori']; 

    public function tokoBuku()
    {
        return $this->belongsTo(TokoBuku::class, 'toko_buku_id');
    }

}
