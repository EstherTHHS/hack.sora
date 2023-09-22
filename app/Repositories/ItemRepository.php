<?php

namespace App\Repositories;

use App\Interfaces\ItemRepositoryInterface;
use App\Models\Item;

class ItemRepository implements ItemRepositoryInterface
{

    public function getItems()
    {

        return Item::get();
    }

    public function getItemById($id)
    {

        $data= Item::where('id',$id)->get();
        return $data;

    }
}



