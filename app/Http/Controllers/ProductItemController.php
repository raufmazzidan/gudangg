<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductItem;
use Illuminate\Http\Request;

class ProductItemController extends Controller
{
    public function detail_product($id)
    {
        $detail = Product::find($id);
        return view('product-item', [
            'page' => 'product',
            'breadcrumb' => [
                [
                    'url' => '/product',
                    'label' => 'Product'
                ],
                [
                    'url' => '',
                    'label' => $detail->name
                ]
            ],
            'detail' => $detail,
            'product_item' => ProductItem::where('id_product', $id)->get()
        ]);
    }

    public function edit($id_product, $id)
    {
        $product = Product::find($id_product);
        $data = ProductItem::find($id);
        return view('product-item-edit', [
            'page' => 'product-item',
            'data' => $data,
            'product' => $product,
            'breadcrumb' => [
                [
                    'url' => '/product',
                    'label' => 'Product'
                ],
                [
                    'url' => '/product/product-item/' . $product->id,
                    'label' => $product->name
                ],
                [
                    'url' => '',
                    'label' => 'Edit Product Stock'
                ]
            ],
        ]);
    }

    public function update(Request $request, $id)
    {

        $payload = $request->validate([
            'id_product' => 'required',
            'serial_number' => 'required',
            'production_date' => 'required',
            'warranty_duration' => 'required|numeric',
        ]);

        ProductItem::where('id', $id)->update($payload);

        return redirect('/product/product-item/' . $request->id_product);
    }
}