<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('backend.products.index', compact('products'));
    }

    function create()
    {
        return view('backend.products.create');
    }

    function store(ProductRequest $request)
    {
        try
        {
            echo $request;
            $data = $request->except('_token');
            Product::create($data);
            return redirect()->route('product.index')->withSuccess('Product is added');
        }
        catch(Exception $e)
        {
            return redirect()->route('product.index')->withError($e->getMessage());
        }
    }
}
