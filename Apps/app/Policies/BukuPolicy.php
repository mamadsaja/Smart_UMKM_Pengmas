<?php

namespace App\Policies;

use App\Models\Buku;
use App\Models\Seller;
use App\Models\TokoBuku;
use Illuminate\Auth\Access\Response;

class BukuPolicy
{
    public function viewAny(Seller $seller): bool
    {
        return true;
    }

    public function view(Seller $seller, Buku $buku): bool
    {
        return $buku->tokoBuku->Id_seller === $seller->id;
    }

    public function create(Seller $seller): bool
    {
        return true;
    }

    public function update(Seller $seller, Buku $buku): bool
    {
        return $buku->tokoBuku->Id_seller === $seller->id;
    }

    public function delete(Seller $seller, Buku $buku): bool
    {
        return $buku->tokoBuku->Id_seller === $seller->id;
    }

    public function restore(Seller $seller, Buku $buku): bool
    {
        return $buku->tokoBuku->Id_seller === $seller->id;
    }

    public function forceDelete(Seller $seller, Buku $buku): bool
    {
        return $buku->tokoBuku->Id_seller === $seller->id;
    }
}
