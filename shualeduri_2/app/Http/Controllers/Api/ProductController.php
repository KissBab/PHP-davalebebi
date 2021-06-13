<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function purchase($id, $stock){
        $product = Product::findorfail($id);
        if ($stock<=0){
            return  response(['message' => "This Product Is Sold Out"]);
        }
        elseif ()

        return $product;
    }
}
