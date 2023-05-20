@extends('layout/main')

@section('app')
<div class="h-16 my-4 flex items-center w-full justify-between">
    <div class="flex items-center">
        <div class="flex items-center gap-2 text-lg text-grey-dark">
            @foreach($breadcrumb as $key => $b)
            @if($b['url'])
            <a href="{{$b['url']}}" class="hover:text-black">{{$b['label']}}</a>
            <i class="h-5 w-5" data-feather="chevron-right"></i>
            @else
            <span class="text-pink font-bold">{{$b['label']}}</span>
            @endif
            @endforeach
        </div>
    </div>
</div>
<div class="mt-4 mb-8">
    <h1 class="text-2xl font-semibold text-grey-dark">Transaction Information</h1>
    <div class="grid grid-cols-2 gap-4 mt-4">
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col">
                <span class="text-grey-dark uppercase">Transaction Number</span>
                <span class="text-lg">{{$detail->transaction_number}}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-grey-dark uppercase">Type</span>
                <span class="text-lg">{{$detail->type}}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-grey-dark uppercase">Transaction Date</span>
                <span class="text-lg">{{$detail->transaction_date}}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-grey-dark uppercase">Customer / Vendor</span>
                <span class="text-lg">{{$detail->partner}}</span>
            </div>
        </div>
    </div>
</div>
<div class=" my-4 flex items-center w-full justify-between">
    <h1 class="text-2xl font-semibold text-grey-dark">Transaction Detail</h1>
</div>
<div class="overflow-auto">
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Product Name</td>
                <td>Serial Number</td>
                <td>Base Price</td>
                <td>Discount</td>
                <td>Final Price</td>
            </tr>
        </thead>
        <tbody>
            @if(!count($transaction_detail))
            <tr>
                <td colspan="8" class="text-center">Data not found</td>
            </tr>
            @endif
            @foreach($transaction_detail as $i => $d)
            <tr>
                <td>{{$i + 1}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->serial_number}}</td>
                <td>Rp{{number_format($d->price,0,',','.')}}</td>
                <td>{{$d->discount}}</td>
                <td>Rp{{number_format($d->final_price,0,',','.')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection