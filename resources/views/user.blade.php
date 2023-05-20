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
    <a class="button" href="/user/create">
        <span>Add User</span>
    </a>
</div>
<div class="overflow-x-scroll">
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Full Name</td>
                <td>Username</td>
                <td>Updated At</td>
                <td>Created At</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @if(!count($data))
            <tr>
                <td colspan="6" class="text-center">Data not found</td>
            </tr>
            @endif
            @foreach($data as $i => $d)
            <tr>
                <td>{{$i + 1}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->username}}</td>
                <td>{{$d->updated_at}}</td>
                <td>{{$d->created_at}}</td>
                <td>
                    <div class="flex flex-col gap-2 h-full">
                        <a href="/user/{{$d->id}}/edit" class="text-yellow flex items-center">
                            <i class="h-3 w-3" data-feather="edit-2"></i>
                            <span class="ml-1">Edit</span>
                        </a>
                        <form method="post" action="/user/{{ $d->id }}">
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