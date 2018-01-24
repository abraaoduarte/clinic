<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{

    public function index(UsersDataTable $users)
    {
        return $users->render('admin.users.index');
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
        return redirect()->route('users');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        if ($request->get('password') == '') {
            $request = $request->except('password');
        } else {
            $request['password'] = bcrypt($request->input('password'));
            $request = $request->all();
        }
        $user = User::find($id);
        $user->update($request);
        flash('Usuário Atualizado!')->success();
        return redirect()->route('users');
    }

    public function delete($id)
    {  
        $user = User::find($id);
        $user->delete();
        flash('Usuário Deletado!')->error();
        return redirect()->route('users');
    }


}
