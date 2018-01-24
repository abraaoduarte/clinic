<?php

namespace App\DataTables;

use App\Models\Doctor;
use Yajra\DataTables\Services\DataTable;

class DoctorsDataTable extends DataTable
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
            ->addColumn('action', 'admin.doctors.actions')
            ->editColumn('created_at', function ($query) {
                return $query->created_at ? $query->created_at->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function ($query) {
                return $query->updated_at ? $query->updated_at->format('d/m/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw(
                    "DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]
                );
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw(
                    "DATE_FORMAT(updated_at,'%d/%m/%Y') like ?", ["%$keyword%"]
                );
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Doctor $model)
    {
        return $model
            ->newQuery()
            ->select
                (
                    'id', 
                    'name',
                    'speciality',
                    'hospital',
                    'created_at', 
                    'updated_at'
                );
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
            ->addAction(['title' => 'Ações', 'width' => '90px'])
            ->parameters(
                ['language' => 
                ['url' => 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json']
            ]);
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
            'width' => '1px',
            'className' => 'dt-center',
           ],
           'name' => [
            'data'  => 'name',
            'name'  => 'name',
            'title' => 'Nome',
           ],
           'speciality' => [
            'data'  => 'speciality',
            'name'  => 'speciality',
            'title' => 'Especialidade',
            'className' => 'dt-center',
           ],
           'hospital' => [
            'data'  => 'hospital',
            'name'  => 'hospital',
            'title' => 'Hospital',
            'className' => 'dt-center',
           ],
           'created_at' => [
            'data'  => 'created_at',
            'name'  => 'created_at',
            'title' => 'Criado',
            'width' => '1px',
            'className' => 'dt-center',
           ],
           'updated_at' => [
            'data'  => 'updated_at',
            'name'  => 'updated_at',
            'title' => 'Atualizado',
            'width' => '1px',
            'className' => 'dt-center',
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
        return 'Doctors_' . date('YmdHis');
    }
}
