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

    function edit($id)
    {
        try
        {
            $data = Product::find($id);
            return view('backend.products.edit', compact('data'));
        }
        catch(Exception $e)
        {
            return redirect()->route('product.index')->withError($e->getMessage());
        }
    }

    function update(ProductRequest $request, $id)
    {
        try
        {
            $data= $request->except('_token');
            Product::where('id', $id)->update($data);
            return redirect()->route('product.index')->withSuccess('Product is updated');
        }
        catch(Exception $e)
        {
            return redirect()->route('product.index')->withError($e->getMessage());
        }
    }

    function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json(['product' => $product]);
    }

    function delete($id)
    {
        try
        {

            $product = Product::findOrFail($id)->delete();
            return redirect()->route('product.index')->withSuccess('Product is deleted');
        }
        catch(Exception $e)
        {
            return redirect()->route('product.index')->withError($e->getMessage());
        }
    }
}
