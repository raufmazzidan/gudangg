<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductItem;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $product_stock = [];

        $product_res = Product::get();

        foreach ($product_res as $p) {
            array_push($product_stock, (object) [
                'id' => $p->id,
                'name' => $p->name,
                'brand' => $p->brand,
                'stock' => count(ProductItem::where('id_product', '=', $p->id)->where('status', '=', 'available')->get())
            ]);
        }

        return view('dashboard', [
            'page' => 'dashboard',
            'breadcrumb' => [
                [
                    'url' => '',
                    'label' => 'Dashboard'
                ]
            ],
            'product' => $product_stock,
            'transaction' => [
                'x' => Transaction::select(Transaction::raw('MONTH(transaction_date) AS month'))->groupBy(Transaction::raw('MONTH(transaction_date)'))->get(),
                'y' => [
                    [
                        'data' => Transaction::where('type', 'sale')->select(Transaction::raw('MONTH(transaction_date) AS month, COUNT(*) AS total'))->groupBy(Transaction::raw('MONTH(transaction_date)'))->get(),
                        'name' => 'sale'
                    ],
                    [
                        'data' => Transaction::where('type', 'procurement')->select(Transaction::raw('MONTH(transaction_date) AS month, COUNT(*) AS total'))->groupBy(Transaction::raw('MONTH(transaction_date)'))->get(),
                        'name' => 'procurement'
                    ]
                ]
            ],
            'revenue' => [
                'x' => TransactionDetail::join('transactions', 'transactions.transaction_number', '=', 'transaction_details.transaction_number')
                    ->select(TransactionDetail::raw('MONTH(transaction_date) AS month'))->groupBy(Transaction::raw('MONTH(transaction_date)'))->get(),
                'z' => TransactionDetail::join('transactions', 'transactions.transaction_number', '=', 'transaction_details.transaction_number')
                    ->select(TransactionDetail::raw('DATE(transaction_date) AS date'))->groupBy(Transaction::raw('DATE(transaction_date)'))->get(),
                'y' => TransactionDetail::join('transactions', 'transactions.transaction_number', '=', 'transaction_details.transaction_number')
                    ->select(TransactionDetail::raw('MONTH(transaction_date) AS month, DATE(transaction_date) AS date, type, transactions.transaction_date, transactions.transaction_number, final_price, discount'))->where('type', 'sale')->get(),

            ]
        ]);
    }
}