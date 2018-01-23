<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\DoctorsDataTable;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;

class DoctorController extends Controller
{
    public function index(DoctorsDataTable $doctors)
    {
    	return $doctors->render('admin.doctors.index');
    }

    public function create()
    {
    	return view('admin.doctors.create');
    }

    public function store(StoreDoctorRequest $request)
    {
    	
    	$request['birthday'] = convert_date($request->input('birthday'));
    	$doctor = Doctor::create($request->all());
    	flash('Médico Cadastrado!')->success();
    	return redirect()->route('doctors');
    }


    public function edit($id)
    {
    	$doctor = Doctor::find($id);
    	return view('admin.doctors.edit')->with('doctor', $doctor);
    }

    public function update(UpdateDoctorRequest $request, $id)
    {
    	$doctor = Doctor::find($id);
    	$request['birthday'] = convert_date($request->input('birthday'));
        $doctor->update($request->all());
    	flash('Médico Atualizado!')->success();
    	return redirect()->route('doctors');
    }

    public function delete($id)
    {
    	$doctor = Doctor::find($id);
    	$doctor->delete();
    	flash('Médico Deletado!')->error();
    	return redirect()->route('doctors');

    }

    public function search(Request $request)
    {
        $doctors = Doctor::select('id', 'name as text')
            ->where('name', 'like', '%'.$request->search.'%')
            ->get();
        return response()->json($doctors);
    }


}
