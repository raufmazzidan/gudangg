<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product', [
            'page' => 'product',
            'breadcrumb' => [
                [
                    'url' => '',
                    'label' => 'Product'
                ]
            ],
            'data' => Product::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product-create', [
            'page' => 'product',
            'breadcrumb' => [
                [
                    'url' => '/product',
                    'label' => 'Product'
                ],
                [
                    'url' => '',
                    'label' => 'Create'
                ]
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'model_no' => 'required',
        ]);

        Product::create($payload);

        return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect('/product');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('product-edit', [
            'page' => 'product',
            'data' => Product::find($id),
            'breadcrumb' => [
                [
                    'url' => '/product',
                    'label' => 'Product'
                ],
                [
                    'url' => '',
                    'label' => 'Edit'
                ]
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $payload = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'model_no' => 'required',
        ]);

        Product::where('id', $id)->update($payload);

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $d = Product::find($id);
        $d->delete();
        return redirect('/product');
    }
}