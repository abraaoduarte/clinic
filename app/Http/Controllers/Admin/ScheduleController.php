<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SchedulesDataTable;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

class ScheduleController extends Controller
{
    public function index(SchedulesDataTable $schedules)
    {
    	return $schedules->render('admin.schedules.index');
    }

    public function create()
    {
    	return view('admin.schedules.create');
    }

    public function store(StoreScheduleRequest $request)
    {
    	$request['date'] = convert_date_time($request->input('date'));
        $request['user_id'] = Auth::id();
    	$schedule = Schedule::create($request->all());
        flash('Consulta Agendada!')->success();
        return redirect()->route('schedules');
    }

    public function edit($id)
    {
    	$schedule = Schedule::find($id);
        $doctor = Doctor::find($schedule->doctor_id)->pluck('name', 'id');
        $patient = Patient::find($schedule->patient_id)->pluck('name', 'id');
    	return view('admin.schedules.edit')
            ->with('schedule', $schedule)
            ->with('doctor', $doctor)
            ->with('patient', $patient);
    }

    public function update(UpdateScheduleRequest $request, $id)
    {

    	$schedule = Schedule::find($id);
    	$request['date'] = convert_date_time($request->input('date'));
        $request['user_id'] = Auth::id();
    	$schedule->update($request->all());
        flash('Paciente Atualizado!')->success();

        return redirect()->route('schedules');
    }

    public function delete($id)
    {
    	$schedule = Schedule::find($id);
    	$schedule->delete();
        flash('Agendamento Apagado!')->error();
        return redirect()->route('schedules');
    }

    
}
