@extends('layout/main')
@section('app')
<form method="post" action="/user" enctype="multipart/form-data">
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
            <label @error('name') class="label-error" @enderror for="name">Full Name</label>
            <input @error('name') class="input-error" @enderror type="text" id="name" name="name"
                value="{{old('name')}}" placeholder="Type here...">
            @error('name')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="form-container">
            <label @error('username') class="label-error" @enderror for="username">Username</label>
            <input @error('username') class="input-error" @enderror type="text" id="username" name="username"
                value="{{old('username')}}" placeholder="Type here...">
            @error('username')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="form-container text-left">
            <label @error('password') class="label-error" @enderror for="password">Password</label>
            <input @error('password') class="input-error" @enderror type="password" id="password" name="password"
                placeholder="Type here..." value="{{old('password')}}" onkeyup="check();">
            @error('password')
            <span class=" text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
    </div>
</form>
@endsection