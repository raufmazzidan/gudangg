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
    <h1 class="text-2xl font-semibold text-grey-dark">Product Information</h1>
    <div class="grid grid-cols-2 gap-4 mt-4">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2 flex flex-col">
                <span class="text-grey-dark uppercase">Product Name</span>
                <span class="text-lg">{{$detail->name}}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-grey-dark uppercase">Brand</span>
                <span class="text-lg">{{$detail->brand}}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-grey-dark uppercase">Model</span>
                <span class="text-lg">{{$detail->model_no}}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-grey-dark uppercase">Price</span>
                <span class="text-lg">Rp{{number_format($detail->price,0,',','.')}}</span>
            </div>
        </div>
    </div>
</div>
<div class=" my-4 flex items-center w-full justify-between">
    <h1 class="text-2xl font-semibold text-grey-dark">Product Stock</h1>
    {{-- <a class="button" href="/product/product-item/{{$detail->id}}/create">
        <span>Add Product Stock</span>
    </a> --}}
</div>
<div class="overflow-auto">
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Serial Number</td>
                <td>Production Date</td>
                <td>Warranty Duration</td>
                <td>Warranty Start</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @if(!count($product_item))
            <tr>
                <td colspan="8" class="text-center">Data not found</td>
            </tr>
            @endif
            @foreach($product_item as $i => $d)
            <tr>
                <td>{{$i + 1}}</td>
                <td>{{$d->serial_number}}</td>
                <td>{{$d->production_date}}</td>
                <td>{{$d->warranty_duration}} months</td>
                <td>{{$d->warranty_start}}</td>
                <td>
                    @if($d->status == 'available')
                    <span class="text-green p-2 border">
                        {{$d->status}}
                    </span>
                    @endif

                    @if($d->status == 'used')
                    <span class="text-red p-2 border">
                        {{$d->status}}
                    </span>
                    @endif
                </td>
                <td>
                    <div class="flex flex-col gap-2 h-full">
                        <a href="/product/product-item/{{$detail->id}}/edit/{{$d->id}}"
                            class="text-yellow flex items-center">
                            <i class="h-3 w-3" data-feather="edit-2"></i>
                            <span class="ml-1">Edit</span>
                        </a>
                        <form method="post" action="/product/product-item/{{ $d->id }}">
                            @method('delete')
                            @csrf
                            <button class="text-red flex items-center" onclick="confirm('are you sure?')">
                                <i class="h-3 w-3" data-feather="trash-2"></i>
                                <span class="ml-1">Delete</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection