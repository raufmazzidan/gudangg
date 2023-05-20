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
<h1 class="text-2xl font-semibold text-grey-dark">Product Stock</h1>
<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4 mt-4">
    @foreach($product as $x => $p)
    <a class="border border-grey-light bg-grey-light p-4 flex flex-col justify-between hover:border-pink"
        href="/product/product-item/{{$p->id}}">
        <span>{{$p->name}}</span>
        <span class="text-xs text-grey italic">{{$p->brand}}</span>
        <span class="text-3xl font-bold text-pink">{{$p->stock}}</span>
    </a>
    @endforeach
</div>
@if(auth()->user()->role === 'super admin')
<div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mt-8">
    <div>
        <h1 class="text-2xl font-semibold text-grey-dark mb-4">Monthly Transaction</h1>
        <div class="bg-grey-light p-2" id="transaction-chart"></div>
    </div>
    <div>
        <h1 class="text-2xl font-semibold text-grey-dark mb-4">Monthly Revenue</h1>
        <div class="bg-grey-light p-2" id="revenue-chart"></div>
    </div>
    <div class="col-span-2">
        <h1 class="text-2xl font-semibold text-grey-dark mb-4">Daily Profit</h1>
        <div class="bg-grey-light p-2" id="daily-chart"></div>
    </div>
</div>
@endif
@endsection

@section('script')
<script>
    const transactionData = {!! json_encode($transaction) !!};
    const revenueData = {!! json_encode($revenue) !!};
</script>
@vite('resources/js/chart/transaction.js')
@vite('resources/js/chart/revenue.js')
@vite('resources/js/chart/daily.js')
@endsection