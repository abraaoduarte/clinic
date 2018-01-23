<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
            ->addColumn('action', 'admin.users.actions')
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
    public function query(User $model)
    {
        return $model->newQuery()->select('id', 'name', 'email', 'updated_at', 'created_at');
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
            'title' => '#'
           ],
           'name' => [
            'data'  => 'name',
            'name'  => 'name',
            'title' => 'Nome',
           ],
           'created_at' => [
            'data'  => 'created_at',
            'name'  => 'created_at',
            'title' => 'Criado'
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
        return 'Users_' . date('YmdHis');
    }
}
