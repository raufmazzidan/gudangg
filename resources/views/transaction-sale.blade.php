@extends('layout/main')
@section('app')
<form method="post" action="/transaction/sale" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="type" value="sale">
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
        <button class="button" type="submit" @if(!count($data)) disabled @endif>
            <span>Submit</span>
        </button>
    </div>
    <div class=" w-1/2 mt-10">
        <div class="form-container">
            <label @error('transaction_number') class="label-error" @enderror for="transaction_number">Transaction
                Number</label>
            <input @error('transaction_number') class="input-error" @enderror type="text" id="transaction_number"
                name="transaction_number" value="{{old('transaction_number')}}" placeholder="Type here...">
            @error('transaction_number')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="form-container">
            <label @error('partner') class="label-error" @enderror for="partner">Customer</label>
            <input @error('partner') class="input-error" @enderror type="text" id="partner" name="partner"
                value="{{old('partner')}}" placeholder="Type here...">
            @error('partner')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="font-semibold mb-2 @error('products') label-error @enderror">Please Select Product Items</div>
        @if(!count($data))
        <span class="text-red">Product are empty, please make procurement first!</span>
        @endif
        @foreach($data as $i => $d)
        <div class="flex gap-4 mb-2">
            <input class="w-fit" type="checkbox" name="products[]" value="{{$d->id}}" id="{{'prod'.$i}}">
            <label for="{{'prod'.$i}}" class="w-full">
                <div class="flex flex-col border border-grey bg-grey-light p-2">
                    <span>{{$d->name}}</span>
                    <span class="text-xs italic color-grey-dark">{{$d->serial_number}}</span>
                    <div class="form-container mt-4">
                        <label @error('discount') class="label-error" @enderror for="discount">
                            Discount
                            <small class="ml-2 italic text-grey">
                                use minus (-) for markup and (+) for discount
                            </small>
                        </label>
                        <input type="number" id="discount" name="discount[{{$d->id}}]"
                            placeholder="Input discount here...">
                        @error('discount')
                        <span class="text-xs text-red mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </label>
        </div>
        @endforeach
        @error('products')
        <span class="text-xs text-red mt-1">{{$message}}</span>
        @enderror
    </div>
</form>
@endsection