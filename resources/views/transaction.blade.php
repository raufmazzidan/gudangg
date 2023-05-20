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
    <div class="flex gap-4">
        <a class="button" href="/transaction/procurement">
            <span>Procurement</span>
        </a>
        <div class="bg-grey-dark" style="width: 1px;">
        </div>
        <a class="button" href="/transaction/sale">
            <span>Sale</span>
        </a>
    </div>
</div>
<form method="get" action="/transaction">
    <div class="flex mb-4 gap-4 items-center">
        @csrf
        <select type="text" name="type" value="{{$type}}" class="w-fit pr-10">
            <option selected value>All Transaction</option>
            <option value="sale" {{$type==='sale' ? 'selected' : '' }}>Sale</option>
            <option value="procurement" {{$type==='procurement' ? 'selected' : '' }}>Procurement</option>
        </select>
        <button class="button">
            <i class="h-5 w-5" data-feather="filter"></i>
        </button>
    </div>
</form>
<div class="overflow-auto">
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Transaction Number</td>
                <td>Transaction Date</td>
                <td>Type</td>
                <td>Customer / Vendor</td>
                <td>Detail</td>
            </tr>
        </thead>
        <tbody>
            @if(!count($data))
            <tr>
                <td colspan="8" class="text-center">Data not found</td>
            </tr>
            @endif
            @foreach($data as $i => $d)
            <tr>
                <td>{{$i + 1}}</td>
                <td>{{$d->transaction_number}}</td>
                <td>{{$d->transaction_date}}</td>
                <td>{{$d->type}}</td>
                <td>{{$d->partner}}</td>
                <td><a href="/transaction/{{$d->id}}" class="cursor-pointer text-blue hover:underline">Open</a>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection