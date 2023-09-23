<?php

namespace App\Repositories;

use App\Interfaces\ItemRepositoryInterface;
use App\Models\Item;

class ItemRepository implements ItemRepositoryInterface
{

    public function getItems()
    {


        $items= Item::all();
        $items->each(function ($item) {
            $item->image_url = asset('image/' . $item->image_url);
        });

        return $items;
    }







    public function getItemById($id)
    {

        $items= Item::where('id',$id)->get();
        $items->each(function ($item) {
            $item->image_url = asset('image/' . $item->image_url);
        });

        return $items;

    }

    public function getItemByCategory($category)
    {

        $items = Item::where('category', $category)->get();

        $items->each(function ($item) {
            $item->image_url = asset('image/' . $item->image_url);
        });

        return $items;
    }
}
