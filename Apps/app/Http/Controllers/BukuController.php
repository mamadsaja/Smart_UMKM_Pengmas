<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use Illuminate\Support\Facades\Crypt;

class BukuController extends Controller
{
    public function show(Buku $id)
    {
        $buku = Buku::with(['penulis', 'penerbit', 'tokoBuku', 'kategoris', 'seller'])
            ->findOrFail($id);

        return view('buku.show', compact('buku'));
    }

    public function detail($hashedId)
    {
        try {
            // Decrypt hashed ID
            $id = Crypt::decryptString($hashedId);
            $buku = Buku::with('tokoBuku', 'kategoris')->findOrFail($id);
            return view('users.book_detail', compact('buku'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function data($id)
    {
        $book = Buku::findOrFail($id);
        return view('book_detail', compact('book'));
    }

    // Helper function to hash ID (can be used in blade templates)
    public static function hashId($id)
    {
        return Crypt::encryptString($id);
    }
}
