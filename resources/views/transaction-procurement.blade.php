@extends('layout/main')
@section('app')
<form method="post" action="/transaction/procurement" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="type" value="procurement">
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
            <label @error('transaction_number') class="label-error" @enderror for="transaction_number">Transaction
                Number</label>
            <input @error('transaction_number') class="input-error" @enderror type="text" id="transaction_number"
                name="transaction_number" value="{{old('transaction_number')}}" placeholder="Type here...">
            @error('transaction_number')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="form-container">
            <label @error('partner') class="label-error" @enderror for="partner">Vendor</label>
            <input @error('partner') class="input-error" @enderror type="text" id="partner" name="partner"
                value="{{old('partner')}}" placeholder="Type here...">
            @error('partner')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="font-semibold mb-2 @error('products') label-error @enderror">Product Items</div>
        <div id="items">
            <div class="flex flex-col border border-grey bg-grey-light p-4 mb-4">
                <div class="form-container">
                    <label @error('id_product') class="label-error" @enderror for="id_product">Product</label>
                    <select @error('id_product') class="input-error" @enderror type="text" id="id_product"
                        name="id_product[0]" value="{{old('id_product'[0])}}">
                        <option disabled selected value>Select Product</option>
                        @foreach($product as $k => $p)
                        <option value="{{$p->id}}" {{$p->id === old('id_product') ? 'selected' : ''}}>{{$p->name}}
                        </option>
                        @endforeach
                    </select>
                    @error('id_product')
                    <span class=" text-xs text-red mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-container">
                    <label @error('serial_number') class="label-error" @enderror for="serial_number">Serial
                        Number</label>
                    <input @error('serial_number') class="input-error" @enderror type="text" id="serial_number"
                        name="serial_number[0]" value="{{old('serial_number'[0])}}" placeholder="Type here...">
                    @error('serial_number')
                    <span class="text-xs text-red mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-container">
                    <label @error('production_date') class="label-error" @enderror for="production_date">Production
                        Date</label>
                    <input @error('production_date') class="input-error" @enderror type="date" id="production_date"
                        name="production_date[0]" value="{{old('production_date'[0])}}" placeholder="Type here...">
                    @error('production_date')
                    <span class="text-xs text-red mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-container">
                    <label @error('warranty_duration') class="label-error" @enderror for="warranty_duration">Warranty
                        Duration
                        (Month)</label>
                    <input @error('warranty_duration') class="input-error" @enderror type="number"
                        id="warranty_duration" name="warranty_duration[0]" value="{{old('warranty_duration'[0])}}"
                        placeholder="Type here...">
                    @error('warranty_duration')
                    <span class="text-xs text-red mt-1">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <span onclick="addItem()" class="flex items-center gap-2 text-green cursor-pointer">
            <i class="h-4 w-4" data-feather="plus"></i>
            Add Product item
        </span>
</form>
@endsection

@section('script')
<script>
    const item = $( "#items" );

    let x = 1;

    function deleteItem(id) {
        $( `#${id}` ).remove();
    }
    
    function addItem() {
        item.append(`
        <div class="flex flex-col border border-grey bg-grey-light p-4 mb-4" id="item-${x}">
                <div class="form-container">
                    <label @error('id_product') class="label-error" @enderror for="id_product">Product</label>
                    <select @error('id_product') class="input-error" @enderror type="text" id="id_product"
                        name="id_product[${x}]">
                        <option disabled selected value>Select Product</option>
                        @foreach($product as $k => $p)
                        <option value="{{$p->id}}" {{$p->id === old('id_product') ? 'selected' : ''}}>{{$p->name}}
                        </option>
                        @endforeach
                    </select>
                    @error('id_product')
                    <span class=" text-xs text-red mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-container">
                    <label @error('serial_number') class="label-error" @enderror for="serial_number">Serial
                        Number</label>
                    <input @error('serial_number') class="input-error" @enderror type="text" id="serial_number"
                        name="serial_number[${x}]" placeholder="Type here...">
                    @error('serial_number')
                    <span class="text-xs text-red mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-container">
                    <label @error('production_date') class="label-error" @enderror for="production_date">Production
                        Date</label>
                    <input @error('production_date') class="input-error" @enderror type="date" id="production_date"
                        name="production_date[${x}]" placeholder="Type here...">
                    @error('production_date')
                    <span class="text-xs text-red mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-container">
                    <label @error('warranty_duration') class="label-error" @enderror for="warranty_duration">Warranty
                        Duration
                        (Month)</label>
                    <input @error('warranty_duration') class="input-error" @enderror type="number"
                        id="warranty_duration" name="warranty_duration[${x}]"
                        placeholder="Type here...">
                    @error('warranty_duration')
                    <span class="text-xs text-red mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class-"flex justify-end w-full">
                    <span onclick="deleteItem('item-${x}')" class="text-red cursor-pointer">
                Delete
            </span>
                    </div>
            </div>
            `);
            x++;
    }


</script>
@endsection