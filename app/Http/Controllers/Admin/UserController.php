<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    

    public function apiDataTable()
    {
        $users = User::select(['name', 'email', 'id']);
        return Datatables::of($users)
            ->addColumn('action', function($user) {
                return view('admin.users.actions', compact('user', $user))->render();
            })
            ->make(true);
    }

    public function index()
    {
        $users = User::all();
    	return view('admin.users.index')->with('users', $users);
    }

    public function create()
    {
    	return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
    	$request['password'] = bcrypt($request->input('password'));
        $user = User::create($request->all());
        flash('Usuário Cadastrado!')->success();
        return redirect('admin/user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $request['password'] = bcrypt($request->input('password'));
        $user->update($request->all());
        flash('Usuário Atualizado!')->success();
        return redirect('admin/user');
    }

    public function delete($id)
    {  
        $user = User::find($id);
        $user->delete();

        flash('Usuário Deletado!')->error();
        return redirect('admin/user');
    }
}
