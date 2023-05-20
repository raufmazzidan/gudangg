@extends('layout/main')
@section('app')
<form method="post" action="/product" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="admin" name="role">
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
            <label @error('name') class="label-error" @enderror for="name">Product Name</label>
            <input @error('name') class="input-error" @enderror type="text" id="name" name="name"
                value="{{old('name')}}" placeholder="Type here...">
            @error('name')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="form-container">
            <label @error('brand') class="label-error" @enderror for="brand">Brand</label>
            <input @error('brand') class="input-error" @enderror type="text" id="brand" name="brand"
                value="{{old('brand')}}" placeholder="Type here...">
            @error('brand')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="form-container">
            <label @error('price') class="label-error" @enderror for="price">Price</label>
            <input @error('price') class="input-error" @enderror type="text" id="price" name="price"
                value="{{old('price')}}" placeholder="Type here...">
            @error('price')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="form-container">
            <label @error('model_no') class="label-error" @enderror for="model_no">Model Number</label>
            <input @error('model_no') class="input-error" @enderror type="text" id="model_no" name="model_no"
                value="{{old('model_no')}}" placeholder="Type here...">
            @error('model_no')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
    </div>
</form>
@endsection