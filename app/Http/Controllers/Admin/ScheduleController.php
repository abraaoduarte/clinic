<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Patient;
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
    	$users = User::pluck('name', 'id');
    	$doctors = Doctor::pluck('name', 'id');
    	$patients = Patient::pluck('name', 'id');
    	return view('admin.schedules.create')
    			->with('users', $users)
    			->with('doctors', $doctors)
    			->with('patients', $patients);
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
    	$users = User::pluck('name', 'id');
    	$doctors = Doctor::pluck('name', 'id');
    	$patients = Patient::pluck('name', 'id');

    	$schedule = Schedule::find($id);
    	return view('admin.schedules.edit')
    			->with('schedule', $schedule)
    			->with('users', $users)
    			->with('doctors', $doctors)
    			->with('patients', $patients);
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
