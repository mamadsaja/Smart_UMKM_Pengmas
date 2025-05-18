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

    public function library()
    {
        $bukus = Buku::with(['penulis', 'tokoBuku'])->paginate(12); // bebas jumlah per page
        return view('users.book', compact('bukus'));
    }

    public function shop(Request $request){
        $query = TokoBuku::withCount('bukus');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('Nama_Toko', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%');
            });
        }

        $tokos = $query->paginate(8);
        return view('users.shop', compact('tokos'));
    }

    public function shop_detail(){
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
