@extends('layout/main')
@section('app')
<form method="post" action="/product/product-item/{{$data->id}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <input type="hidden" value="{{$product->id}}" name="id_product">
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
        <button class="button" type="submit">
            <span>Submit</span>
        </button>
    </div>
    <div class=" w-1/2 mt-10">
        <div class="form-container">
            <label @error('serial_number') class="label-error" @enderror for="serial_number">Serial Number</label>
            <input @error('serial_number') class="input-error" @enderror type="text" id="serial_number"
                name="serial_number" value="{{old('serial_number', $data->serial_number)}}" placeholder="Type here...">
            @error('serial_number')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="form-container">
            <label @error('production_date') class="label-error" @enderror for="production_date">Production Date</label>
            <input @error('production_date') class="input-error" @enderror type="date" id="production_date"
                name="production_date" value="{{old('production_date', $data->production_date)}}"
                placeholder="Type here...">
            @error('production_date')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="form-container">
            <label @error('warranty_duration') class="label-error" @enderror for="warranty_duration">Warranty Duration
                (Month)</label>
            <input @error('warranty_duration') class="input-error" @enderror type="number" id="warranty_duration"
                name="warranty_duration" value="{{old('warranty_duration', $data->warranty_duration)}}"
                placeholder="Type here...">
            @error('warranty_duration')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
    </div>
</form>
@endsection