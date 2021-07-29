<?php

namespace App\DataTables;

use App\Models\ordenes;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;


class ordenesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        $dataTable = new EloquentDataTable($query);
        $dataTable->setRowAttr([
            'estado' => function($dataTable) {
                return $dataTable->estado;
            },
        ]);
        return  $dataTable->addColumn('action', 'ordenes.datatables_actions');
        // $dataTable->editColumn('estado', "<span class='label bg-red' style='font-size: 21px;'>open</span>");
        /* $dataTable->make(true); */

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ordenes $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ordenes $model)
    {
        if(Auth::user()->id == 1){
            return  $model::where('estado', '!=', 'SISTEMA PAGO');
        }else{
            return  $model::where('users_id', '=', Auth::user()->id)
            ->where('estado', '!=', 'SISTEMA PAGO');
        }

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
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],

                ],
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
            'order_id',
            /* 'status', */
            'email',
            'nombre',
            'apellido',
            'estado',
            'total_ventas',
            'total_pagado'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ordenes_datatable_' . time();
    }
}
