<?php

namespace App\Repositories;

use App\Models\Shoe;
use App\Repositories\Contracts\ShoeRepositoryInterface;


class ShoeRepository implements ShoeRepositoryInterface
{
    public function getPopularShoes(int $limit = 4)
    {
        return Shoe::where('is_popular', true)->take($limit)->get();
    }

    public function getAllNewShoes()
    {
        return Shoe::latest()->get();
    }

    public function searchByName(string $keyword)
    {
        return Shoes::where('name', 'LIKE', '%' . $keyword . '%')->get();
    }

    public function find(int $id) // 1
    {
        return Shoe::find($id);
    }

    public function getPrice(int $shoeId)
    {
        $shoe = $this->find($shoeId);
        return $shoe ? $shoe->price : 0;
    }
}
