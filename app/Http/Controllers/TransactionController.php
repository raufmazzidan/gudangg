<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductItem;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [];
        if ($request->type) {
            $data = Transaction::where('type', '=', $request->type)->orderByDesc('transaction_date')->get();
        } else {
            $data = Transaction::orderByDesc('transaction_date')->get();
        }

        return view('transaction', [
            'page' => 'transaction',
            'breadcrumb' => [
                [
                    'url' => '',
                    'label' => 'Transaction'
                ]
            ],
            'data' => $data,
            'type' => $request->type
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect('/transaction');
    }

    public function procurement()
    {
        return view('transaction-procurement', [
            'page' => 'transaction',
            'breadcrumb' => [
                [
                    'url' => '/transaction',
                    'label' => 'Transaction'
                ],
                [
                    'url' => '',
                    'label' => 'Procurement'
                ]
            ],
            'data' => ProductItem::join('products', 'products.id', '=', 'product_items.id_product')->where('status', '=', 'available')->get(['product_items.id AS id', 'products.id as id_product', 'products.*', 'product_items.*']),
            'product' => Product::get()
        ]);
    }

    public function store_procurement(Request $request)
    {
        $payload = $request->validate([
            'type' => 'required',
            'partner' => 'required',
            'transaction_number' => 'required|unique:transactions',
            'id_product' => 'required|array|min:1',
            'serial_number' => 'required|array|min:1',
            'production_date' => 'required|array|min:1',
            'warranty_duration' => 'required|array|min:1',
        ]);

        $trans = Transaction::create([
            'type' => $payload['type'],
            'partner' => $payload['partner'],
            'transaction_number' => $payload['transaction_number'],
            'transaction_date' => date("Y-m-d H:i:s"),
        ]);

        if ($trans->exists) {
            foreach ($request->id_product as $k => $id) {
                TransactionDetail::create([
                    'transaction_number' => $payload['transaction_number'],
                    'serial_number' => $request->serial_number[$k],
                    'discount' => '0',
                    'final_price' => '0'
                ]);

                ProductItem::create([
                    'status' => 'available',
                    'warranty_start' => '-',
                    'id_product' => $request->id_product[$k],
                    'serial_number' => $request->serial_number[$k],
                    'production_date' => $request->production_date[$k],
                    'warranty_duration' => $request->warranty_duration[$k],
                ]);
            }

            return redirect('/transaction');
        }
    }

    public function sale()
    {
        return view('transaction-sale', [
            'page' => 'transaction',
            'breadcrumb' => [
                [
                    'url' => '/transaction',
                    'label' => 'Transaction'
                ],
                [
                    'url' => '',
                    'label' => 'Sale'
                ]
            ],
            'data' => ProductItem::join('products', 'products.id', '=', 'product_items.id_product')->where('status', '=', 'available')->get(['product_items.id AS id', 'products.id as id_product', 'products.*', 'product_items.*'])
        ]);
    }

    public function store_sale(Request $request)
    {
        // echo json_encode($request->all());
        // echo $request->discount['1'];

        $payload = $request->validate([
            'type' => 'required',
            'partner' => 'required',
            'transaction_number' => 'required|unique:transactions',
            'products' => 'required|array|min:1',
        ]);

        $trans = Transaction::create([
            'type' => $payload['type'],
            'partner' => $payload['partner'],
            'transaction_number' => $payload['transaction_number'],
            'transaction_date' => date("Y-m-d H:i:s"),
        ]);

        if ($trans->exists) {
            foreach ($request['products'] as $i => $p) {
                $prod_detail = ProductItem::join('products', 'products.id', '=', 'product_items.id_product')
                    ->select(['product_items.id AS id', 'products.id as id_product', 'products.*', 'product_items.*'])
                    ->find($p);

                $discount = 0;

                if ($request->discount[$p]) {
                    $discount = $request->discount[$p];
                }

                $final_price = $prod_detail['price'] - ($prod_detail['price'] * ($discount / 100));

                TransactionDetail::create([
                    'transaction_number' => $payload['transaction_number'],
                    'serial_number' => $prod_detail['serial_number'],
                    'discount' => $discount,
                    'final_price' => $final_price
                ]);

                ProductItem::where('id', $p)->update([
                    'status' => 'used',
                    'warranty_start' => date("Y-m-d H:i:s"),
                ]);
            }

            return redirect('/transaction');
        } else {
            // failure 
        }

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detail = Transaction::find($id);
        return view('transaction-detail', [
            'page' => 'transaction',
            'breadcrumb' => [
                [
                    'url' => '/transaction',
                    'label' => 'Transaction'
                ],
                [
                    'url' => '',
                    'label' => $detail->transaction_number
                ]
            ],
            'detail' => $detail,
            'transaction_detail' => TransactionDetail::where('transaction_number', $detail->transaction_number)
                ->join('product_items', 'product_items.serial_number', '=', 'transaction_details.serial_number')
                ->join('products', 'product_items.id_product', '=', 'products.id')
                ->select(['product_items.id AS prosuct_items_id', 'products.id as id_product', 'transaction_details.*', 'products.*', 'product_items.*'])
                ->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}