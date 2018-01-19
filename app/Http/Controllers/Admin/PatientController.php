<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Patient;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;

class PatientController extends Controller
{

	public function apiDataTable()
    {
        $patients = Patient::all();
        return Datatables::of($patients)
            ->addColumn('action', function($patient) {
                return view('admin.patients.buttons_actions', compact('patient', $patient))->render();
            })
            ->make(true);
    }

    public function index()
    {
    	$patients = Patient::all();
    	return view('admin.patients.index');
    }

    public function create()
    {
        return view('admin.patients.create');
    }

    public function store(StorePatientRequest $request)
    {
        $request['birthday'] = $this->convertDataPtBrToBd($request->input('birthday'));
        $patient = Patient::create($request->all());
        flash('Paciente Cadastrado!')->success();
        return redirect('admin/patient');
    }


    public function edit($id)
    {
    	$patient = Patient::find($id);
    	return view('admin.patients.edit')->with('patient', $patient);
    }

    public function update(UpdatePatientRequest $request, $id)
    {
        $patient = Patient::find($id);
        $request['birthday'] = $this->convertDataPtBrToBd($request->input('birthday'));
        $patient->update($request->all());

        flash('Paciente Atualizado!')->success();
        return redirect('admin/patient');

    }

    public function delete($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        flash('Paciente Apagado!')->error();
        return redirect('admin/patient');
    }

    public function convertDataPtBrToBd($birthday)
    {
        $dataFormat = Carbon::createFromFormat('d/m/Y', $birthday);
        return $dataFormat;
    }

}
