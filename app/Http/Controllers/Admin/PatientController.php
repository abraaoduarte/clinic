<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\DataTables\PatientsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;

class PatientController extends Controller
{
	
    public function index(PatientsDataTable $patients)
    {
    	return $patients->render('admin.patients.index');
    }

    public function create()
    {
        return view('admin.patients.create');
    }

    public function store(StorePatientRequest $request)
    {
        $request['birthday'] = convert_date($request->input('birthday'));
        $patient = Patient::create($request->all());
        flash('Paciente Cadastrado!')->success();
        return redirect()->route('patients');
    }


    public function edit($id)
    {
    	$patient = Patient::find($id);
    	return view('admin.patients.edit')->with('patient', $patient);
    }

    public function update(UpdatePatientRequest $request, $id)
    {
        $patient = Patient::find($id);
        $request['birthday'] = convert_date($request->input('birthday'));
        $patient->update($request->all());

        flash('Paciente Atualizado!')->success();
        return redirect()->route('patients');

    }

    public function delete($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        flash('Paciente Apagado!')->error();
        return redirect()->route('patients');
    }

    public function search(Request $request)
    {
        $patients = Patient::select('id', 'name as text')
            ->where('name', 'like', '%'.$request->search.'%')
            ->get();
        return response()->json($patients);
    }

    public function show($id)
    {
        $patient = Patient::find($id);
        return view('admin.patients.search_patient')->with('patient', $patient);

    }

}
