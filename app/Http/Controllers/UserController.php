<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user', [
            'page' => 'user',
            'breadcrumb' => [
                [
                    'url' => '',
                    'label' => 'User Management'
                ]
            ],
            'data' => User::where('role', 'admin')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user-create', [
            'page' => 'user',
            'breadcrumb' => [
                [
                    'url' => '/user',
                    'label' => 'User Management'
                ],
                [
                    'url' => '',
                    'label' => 'Create'
                ]
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'username' => 'required|unique:users',
            'password' => Password::min(8)->mixedCase()->numbers(),
        ]);

        $payload['password'] = Hash::make($payload['password']);

        User::create($payload);

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('user-edit', [
            'page' => 'user',
            'data' => User::find($id),
            'breadcrumb' => [
                [
                    'url' => '/user',
                    'label' => 'User Management'
                ],
                [
                    'url' => '',
                    'label' => 'Edit'
                ]
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $rule = [
            'name' => 'required',
            'role' => 'required',
            'username' => 'required',
        ];

        if ($request['password']) {
            $rule['password'] = Password::min(8)->mixedCase()->numbers();
        }

        if ($request['username'] != $user->username) {
            $rule['username'] = 'required|unique:users';
        }

        $payload = $request->validate($rule);

        if ($request['password']) {
            $payload['password'] = Hash::make($payload['password']);
        }

        User::where('id', $id)->update($payload);

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $d = User::find($id);
        $d->delete();
        return redirect('/user');
    }
}