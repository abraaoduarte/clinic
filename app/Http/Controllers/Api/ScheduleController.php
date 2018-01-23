<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

class ScheduleController extends Controller
{
	
    public function index()
    {
        $schedules = Schedule::all();
    	return $schedules;
    }

    public function store(StoreScheduleRequest $request)
    {
        $request['date'] = convert_date_time($request->input('date'));
        $schedule = Schedule::create($request->all());
        return $schedule;
    }


    public function show($id)
    {
    	$schedule = Schedule::find($id);
        if($schedule) {
            return $schedule;
        }
    	$arrayMessage = ['message' => 'Agendamento não encontrado!'];
        return response()->json($arrayMessage, 401);
    }

    public function update(UpdateScheduleRequest $request, $id)
    {
        $schedule = Schedule::find($id);
        $request['date'] = convert_date_time($request->input('date'));
        $schedule->update($request->all());
        if($schedule) {
            return $schedule;
        }
        $arrayMessage = ['message' => 'Agendamento não encontrado!'];
        return response()->json($arrayMessage, 401);  

    }

    public function delete($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        if($schedule) {
            return $schedule;
        }
        $arrayMessage = ['message' => 'Agendamento não encontrado!'];
        return response()->json($arrayMessage, 401);  
    }

    

}
