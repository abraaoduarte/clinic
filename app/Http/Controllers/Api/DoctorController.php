<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;

class DoctorController extends Controller
{
	
    public function index()
    {
        $doctors = Doctor::all();
    	return $doctors;
    }

    public function store(StoreDoctorRequest $request)
    {
        $request['birthday'] = convert_date($request->input('birthday'));
        $doctor = Doctor::create($request->all());
        return $doctor;
    }


    public function show($id)
    {
    	$doctor = Doctor::find($id);
        if($doctor) {
            return $doctor;
        }
    	$arrayMessage = ['message' => 'Médico não encontrado!'];
        return response()->json($arrayMessage, 401);
    }

    public function update(UpdateDoctorRequest $request, $id)
    {
        $doctor = Doctor::find($id);
        $request['birthday'] = convert_date($request->input('birthday'));
        $doctor->update($request->all());
        if($doctor) {
            return $doctor;
        }
        $arrayMessage = ['message' => 'Médico não encontrado!'];
        return response()->json($arrayMessage, 401);  

    }

    public function delete($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        if($doctor) {
            return $doctor;
        }
        $arrayMessage = ['message' => 'Médico não encontrado!'];
        return response()->json($arrayMessage, 401);  
    }

    

}
