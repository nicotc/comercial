<?php

namespace App\DataTables;

use App\Models\vista;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class importarDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'importars.datatables_actions');
    }

            //return $request->date_created->formatLocalized('%a, %b %d, %Y %H:%M')();


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\vista $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(vista $model)
    {


         return vista::select(
            'order_id as id',
            'order_id',
            'date_created',
            'num_items_sold',
            'total_sales',
            'tax_total',
            'shipping_total',
            'net_total',
            'returning_customer',
            'status',
            'username',
            'first_name',
            'last_name',
            'email',
            'customer_id',
            'user_id',
            'country',
            'postcode',
            'city',
            'state');

/*     return
            importar::with('yidn2_wc_customer_lookups', 'oreder_id', 'oreder_id')
                        ->select('yidn2_wc_order_stats.*');
 */
       /*  return importar::select(
            'yidn2_wc_order_stats.order_id as id',
            'yidn2_wc_order_stats.*',
            'yidn2_wc_customer_lookup.*')
            ->join('yidn2_wc_customer_lookup',
                            'yidn2_wc_order_stats.customer_id',
                            '=',
                            'yidn2_wc_customer_lookup.customer_id');
 */


      /* return $model->newQuery(); */
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
            'first_name'=> [
                            'title' => 'Nombre',
                            'name' => 'first_name',
                            'data' => 'first_name'
                        ],
            'last_name'=> [
                            'name' => 'last_name',
                            'data' => 'last_name'
                        ],
            'email'=> [
                            'name' => 'email',
                            'data' => 'email'
                        ],
            'date_created',
            'status'=> [
                            'name' => 'status',
                            'data' => 'status'
                        ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'importars_datatable_' . time();
    }
}
