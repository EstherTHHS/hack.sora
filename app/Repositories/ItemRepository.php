<?php

namespace App\Repositories;

use App\Interfaces\ItemRepositoryInterface;
use App\Models\Item;

class ItemRepository implements ItemRepositoryInterface
{

    public function getItems()
    {

        $items= Item::get();
        $items->each(function ($item) {
            $item->image_url = asset('itemImages/' . $item->image_url);
        });

        return $items;

    }

    public function getItemById($id)
    {

        $items= Item::where('id',$id)->get();
        $items->each(function ($item) {
            $item->image_url = asset('itemImages/' . $item->image_url);
        });

        return $items;

    }

    public function getItemByCategory($category)
    {

        $items= Item::where('category',$category)->get();
        $items->each(function ($item) {
            $item->image_url = asset('itemImages/' . $item->image_url);
        });

        return $items;

    }
}



