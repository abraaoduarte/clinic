<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function store(StoreUserRequest $request)
    {
    	$request['password'] = bcrypt($request->input('password'));
        $user = User::create($request->all());
        return response()->json($user);
    }

    public function show($id)
    {
        $user = User::find($id);
        if($user) {
            return response()->json($user);
        }
        $arrayMessage = ['message' => 'Usuário não encontrado!'];
        return response()->json($arrayMessage, 404);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $request['password'] = bcrypt($request->input('password'));
        $user->update($request->all());
        return response()->json($user);
    }

    public function delete($id)
    {  
        $user = User::find($id);
        $user->delete();
        return response()->json($user);
    }


}
