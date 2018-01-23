<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Patient;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;

class PatientController extends Controller
{
	
    public function index()
    {
        $patients = Patient::all();
    	return $patients;
    }

    public function store(StorePatientRequest $request)
    {
        $request['birthday'] = convert_date($request->input('birthday'));
        $patient = Patient::create($request->all());
        return $patient;
    }


    public function show($id)
    {
    	$patient = Patient::find($id);
        if($patient) {
            return $patient;
        }
    	$arrayMessage = ['message' => 'Paciente não encontrado!'];
        return response()->json($arrayMessage, 401);
    }

    public function update(UpdatePatientRequest $request, $id)
    {
        $patient = Patient::find($id);
        $request['birthday'] = convert_date($request->input('birthday'));
        $patient->update($request->all());
        if($patient) {
            return $patient;
        }
        $arrayMessage = ['message' => 'Paciente não encontrado!'];
        return response()->json($arrayMessage, 401);  

    }

    public function delete($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        if($patient) {
            return $patient;
        }
        $arrayMessage = ['message' => 'Paciente não encontrado!'];
        return response()->json($arrayMessage, 401);  
    }

    

}
