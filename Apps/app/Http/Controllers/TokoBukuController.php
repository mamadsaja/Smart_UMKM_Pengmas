<?php

namespace App\Http\Controllers;

use App\Models\TokoBuku;
use Illuminate\Http\Request;

class TokoBukuController extends Controller
{
    public function show($id)
    {
        $toko = TokoBuku::with('seller')->findOrFail($id);
        $bukus = $toko->bukus()->paginate(6); // ini paginationnya aktif
        return view('users.shop_detail', compact('toko', 'bukus'));
    }
}
