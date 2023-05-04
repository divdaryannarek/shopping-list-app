<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function allCategories()
    {
        return Product::latest()->paginate(10);
    }

    public function storeProduct($data)
    {
        return Product::create($data);
    }

    public function getProductInfo($id)
    {

        $product = Product::with('reviews.user')->find($id);

        return [
            'product' => $product,
            'avgRate' => $product->reviews->avg('rate'),
        ];

    }

    public function updateProduct($data, $id)
    {
//        $product = Product::where('id', $id)->first();
//        $product->save();
    }

    public function destroyProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
