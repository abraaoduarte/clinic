<?php

namespace App\DataTables;

use App\Models\Schedule;
use Yajra\DataTables\Services\DataTable;

class SchedulesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'admin.schedules.actions')
            ->editColumn('created_at', function ($query) {
                return $query->created_at ? $query->created_at->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function ($query) {
                return $query->updated_at ? $query->updated_at->format('d/m/Y') : '';
            })
            ->editColumn('date', function ($query) {
                return $query->date ? $query->date->format('d/m/Y H:i') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw(
                    "DATE_FORMAT(schedules.created_at,'%d/%m/%Y') like ?", ["%$keyword%"]
                );
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw(
                    "DATE_FORMAT(schedules.updated_at,'%d/%m/%Y') like ?", ["%$keyword%"]
                );
            })
            ->filterColumn('date', function ($query, $keyword) {
                $query->whereRaw(
                    "DATE_FORMAT(schedules.date,'%d/%m/%Y') like ?", ["%$keyword%"]
                );
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Schedule $model)
    {
        return $model->newQuery()
            ->select(
                'schedules.id',
                'date', 
                'users.name as name_user', 
                'doctors.name as name_doctor', 
                'patients.name as name_patient',
                'schedules.created_at', 
                'schedules.updated_at'
            )
            ->join('users', 'schedules.user_id', '=', 'users.id')
            ->join('doctors', 'schedules.doctor_id', '=', 'doctors.id')
            ->join('patients', 'schedules.patient_id', '=', 'patients.id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['title' => 'Ações'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => [
                'data'  => 'id',
                'name'  => 'id',
                'title' => '#',
            ],
            'date' => [
                'data'  => 'date',
                'name'  => 'date',
                'title' => 'Data & Hora',
            ],
            'name_user' => [
                'data'  => 'name_user',
                'name'  => 'users.name',
                'title' => 'Usuário',
            ],
            'name_doctor' => [
                'data'  => 'name_doctor',
                'name'  => 'doctors.name',
                'title' => 'Médico',
            ],
            'name_patient' => [
                'data'  => 'name_patient',
                'name'  => 'patients.name',
                'title' => 'Paciente',
            ],
            'created_at' => [
                'data'  => 'created_at',
                'name'  => 'created_at',
                'title' => 'Criado',
            ],
            'updated_at' => [
                'data'  => 'updated_at',
                'name'  => 'updated_at',
                'title' => 'Atualizado',
            ]

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Schedules_' . date('YmdHis');
    }
}
