<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;

class BukuController extends Controller
{
    public function show(Buku $id)
    {
        $buku = Buku::with(['penulis', 'penerbit', 'tokoBuku', 'kategoris', 'seller'])
            ->findOrFail($id);

        return view('buku.show', compact('buku'));
    }

    public function detail($id)
    {
        $buku = Buku::with('tokoBuku', 'kategoris')->findOrFail($id);
        return view('users.book_detail', compact('buku'));
    }

    public function data($id)
    {
        $book = Buku::findOrFail($id);
        return view('book_detail', compact('book'));
    }

}
