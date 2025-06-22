<?php

namespace App\Http\Controllers;

use App\Models\TokoBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TokoBukuController extends Controller
{
    public function show($hashedId)
    {
        try {
            // Decrypt hashed ID
            $id = Crypt::decryptString($hashedId);
            $toko = TokoBuku::with('seller')->findOrFail($id);
            $bukus = $toko->bukus()->paginate(6); // ini paginationnya aktif
            return view('users.shop_detail', compact('toko', 'bukus'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    // Helper function to hash ID (can be used in blade templates)
    public static function hashId($id)
    {
        return Crypt::encryptString($id);
    }
}
