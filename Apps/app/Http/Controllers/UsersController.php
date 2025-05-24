<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\users;
use App\Models\TokoBuku;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.Home');
    }

    public function library(Request $request)
    {
        // Ambil semua kategori untuk ditampilkan di navigasi
        $kategoris = \App\Models\Kategori::all();
        
        // Inisialisasi query builder
        $query = Buku::with(['penulis', 'tokoBuku']);
        
        // Filter berdasarkan kategori jika ada
        if ($request->has('kategori') && $request->kategori != 'semua') {
            $kategoriId = \App\Models\Kategori::where('namaKategori', $request->kategori)->first();
            if ($kategoriId) {
                $query->whereHas('kategoris', function($q) use ($kategoriId) {
                    $q->where('kategori.id', $kategoriId->id);
                });
            }
        }
        
        // Filter berdasarkan pencarian jika ada
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('penulis', 'like', '%' . $search . '%');
            });
        }
        
        // Filter berdasarkan rentang harga
        if ($request->has('min_price') && is_numeric($request->min_price)) {
            $query->where('harga', '>=', $request->min_price);
        }
        
        if ($request->has('max_price') && is_numeric($request->max_price)) {
            $query->where('harga', '<=', $request->max_price);
        }
        
        // Pengurutan berdasarkan pilihan
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('harga', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('harga', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }
        
        $bukus = $query->paginate(12);
        
        return view('users.book', compact('bukus', 'kategoris'));
    }

    public function shop(Request $request)
    {
        $query = TokoBuku::withCount('bukus');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('Nama_Toko', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            });
        }

        $tokos = $query->paginate(8);
        return view('users.shop', compact('tokos'));
    }

    public function shop_detail()
    {
        return view('users.shop_detail');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(users $users)
    {
        //
    }
}
