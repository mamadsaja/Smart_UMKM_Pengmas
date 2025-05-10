<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    protected $guarded = 'id';
    protected $table = 'penerbit';
    protected $casts = ['Link_Marketplace' => 'array'];
    protected $fillable = ['nama'];
}
