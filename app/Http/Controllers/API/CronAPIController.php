<?php

namespace App\Http\Controllers\API;

use Response;
use App\Models\vista;
use App\Models\ordenes;
use App\Models\importar;
use App\Models\Porcentajes;
use App\Models\ordenesitems;
use Illuminate\Http\Request;
use App\Models\importar_items;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AppBaseController;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

class CronAPIController extends AppBaseController
{
    /** @var  UserRepository */


    public function __construct()
    {

    }

    /**
     * Display a listing of the User.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        $orders_ides =   ordenes::select('order_id')->get()->toArray();
        $ids_no[] = 0;
        foreach ($orders_ides as $orden_no){
            $ids_no[] = $orden_no['order_id'];
        }


        $ids_ordenes_ya_registradas = array_values($ids_no);
        $importar_x =   vista::select('order_id')
            ->whereNotIn('order_id', array_values($ids_ordenes_ya_registradas))
            ->get()->toArray();

        if(count($importar_x) == 0){
            die;
        }


        foreach ($importar_x as $orden_si){
            $ids[] = $orden_si['order_id'];
        }

        $ids_ordenes_que_si_se_van_a_registrar = array_values($ids);
     //   dump("ids_ordenes_que_si_se_van_a_registrar", $ids_ordenes_que_si_se_van_a_registrar);

        foreach ($ids_ordenes_que_si_se_van_a_registrar as $orden_consulta) {
            $importar = importar::select(
                'yIDN2_wc_order_stats.order_id as id',
                'yIDN2_wc_order_stats.total_sales',
                'yIDN2_wc_order_stats.status',
                'yIDN2_wc_order_stats.customer_id',
                'yIDN2_wc_customer_lookup.username',
                'yIDN2_wc_customer_lookup.first_name',
                'yIDN2_wc_customer_lookup.last_name',
                'yIDN2_wc_customer_lookup.email',
                'yIDN2_wc_customer_lookup.country'
            )
            ->join(
                'yIDN2_wc_customer_lookup',
                'yIDN2_wc_order_stats.customer_id',
                '=',
                'yIDN2_wc_customer_lookup.customer_id'
                )
            ->where('order_id', '=',  $orden_consulta)->first();
            $orders_items =  importar_items::select(
                'yIDN2_woocommerce_order_items.order_item_id',
                'yIDN2_woocommerce_order_items.order_item_name',
                'yIDN2_woocommerce_order_items.order_item_type',
                'yIDN2_woocommerce_order_items.order_id',
                'yIDN2_woocommerce_order_itemmeta.meta_key',
                'yIDN2_woocommerce_order_itemmeta.meta_value'
            )
            ->join('yIDN2_woocommerce_order_itemmeta', 'yIDN2_woocommerce_order_items.order_item_id', '=', 'yIDN2_woocommerce_order_itemmeta.order_item_id')
            ->where('yIDN2_woocommerce_order_items.order_id', '=',  $orden_consulta)

            ->get();


            foreach ($orders_items as $key => $items) {
                $arr[$items['order_item_id']]['name'] = $items['order_item_name'];
                if ($items['meta_key'] == '_product_id') {
                    $sispago = $items['meta_value'];
                    $arr[$items['order_item_id']]['product_id'] = $items['meta_value'];
                }
                if ($items['meta_key'] == '_variation_id') {
                    $arr[$items['order_item_id']]['variation_id'] = $items['meta_value'];
                }
                if ($items['meta_key'] == '_qty') {
                    $arr[$items['order_item_id']]['cantidad'] = $items['meta_value'];
                }
                if ($items['meta_key'] == '_line_total') {
                    $arr[$items['order_item_id']]['total'] = $items['meta_value'];
                }
                if ($items['meta_key'] == 'Personnalisation') {
                    $arr[$items['order_item_id']]['personalizacion'] = $items['meta_value'];
                }
            }
            /*   if(isset($sispago)){} */
            if ($sispago != 26411) {
                $ordenes = ordenes::create([
                    'order_id' =>  $orden_consulta,
                    'status' => $importar->status,
                    'users_id' => 0,
                    'estado' => "PENDIENTE",
                    'country' => $importar->country,
                    'email' => $importar->email,
                    'nombre' => $importar->first_name,
                    'apellido' => $importar->last_name,
                    'total_ventas' => $importar->total_sales,
                    'total_pagado' => 0
                ]);

                foreach ($arr as $items_key => $items_value) {
                    if (!isset($items_value['personalizacion'])) {
                        $items_value['personalizacion'] = 0;
                    }
                    if (!isset($items_value['ordenes_id'])) {
                        $items_value['ordenes_id'] = 0;
                    }
                    if (!isset($items_value['name'])) {
                        $items_value['name'] = "";
                    }
                    if ((!isset($items_value['product_id'])) or
                        ($items_value['product_id'] == '')) {
                        $items_value['product_id'] = 0;
                    }
                    if ((!isset($items_value['variation_id'])) or
                        ($items_value['variation_id'] == '')) {
                        $items_value['variation_id'] = 0;
                    }

                    if ((!isset($items_value['cantidad'])) or ($items_value['cantidad'] == '')) {
                        $items_value['cantidad'] = 0;
                    }
                    if ((!isset($items_value['total'])) or ($items_value['total'] == '')) {
                        $items_value['total'] = 0;
                    }
                    if ((!isset($items_value['personalizacion'])) or ($items_value['personalizacion'] == '')) {
                        $items_value['personalizacion'] = 0;
                    }

                    $porcentajes = Porcentajes::pluck('porcentaje', 'product_id');

                    $importe_pendiente = 0;
                    if (isset($porcentajes[$items_value['product_id']])) {
                        $importe_pendiente = $porcentajes[$items_value['product_id']];
                    }

                    $arr2[] = $importe_pendiente;
                    $abonado[] = $items_value['total'];

                    $importar_items = ordenesitems::create([
                        'ordenes_id' =>  $orden_consulta,
                        'order_item_id' => $items_key,
                        'name' => $items_value['name'],
                        'product_id' => $items_value['product_id'],
                        'variation_id' => $items_value['variation_id'],
                        'cantidad' => $items_value['cantidad'],
                        'total' => $items_value['total'] + $importe_pendiente,
                        'abonado' => $items_value['total'],
                        'personalizacion' => $items_value['personalizacion']
                    ]);
                }

                $ordenes->total_ventas = array_sum($abonado)+array_sum($arr2);
                $ordenes->total_pagado = array_sum($abonado);

                if ($ordenes->total_ventas ==  $ordenes->total_pagado) {
                    $ordenes->estado = "PRE-NEGOCIACIÓN";
                }

                $ordenes->save();
            } else {
                if(isset($arr2)){
                    foreach ($arr2 as $valor) {
                        $SistemaDePagos =  $valor['total'];
                    }
                    $ordenes_activas =  ordenes::where('email', '=', $importar->email)
                                    ->where('estado', '!=', "ENVIADO")
                                    ->where('estado', '!=', "PRE-NEGOCIACIÓN")
                                    ->first();
                    if (isset($ordenes_activas->order_id)) {
                        // $SistemaDePagos
                        $items =   ordenesitems::select('id', 'total', 'abonado')->where('ordenes_id', '=', $ordenes_activas->order_id)->get();
                        foreach ($items as $item) {
                            $Faltaporpagar =  $item->total - $item->abonado;
                            $SistemaDePagos = $SistemaDePagos - $Faltaporpagar;
                            if ($SistemaDePagos >= 0) {
                                $or = ordenesitems::find($item->id);
                                $or->abonado = $item->total;
                                $or->save();
                            } else {
                                $SistemaDePagos = $SistemaDePagos + $Faltaporpagar;
                                $or = ordenesitems::find($item->id);
                                $or->abonado = $or->abonado + $SistemaDePagos;
                                $or->save();
                            }


                        // cosultar las sumas de las o abonado y de total
                        // y actiualizar en ordenes

                            $sumas = DB::table('ordenes_items')
                            ->select(DB::raw('SUM(ordenes_items.total) AS total'), DB::raw('SUM(ordenes_items.abonado) AS abonado'))
                            ->where('ordenes_id', '=', $ordenes_activas->order_id)
                            ->first();
                            $ordenes_up = ordenes::find($ordenes_activas->id);
                            if ($sumas->total == $sumas->abonado) {
                                $ordenes_up->estado = "PRE-NEGOCIACIÓN";
                            }
                            $ordenes_up->total_ventas = $sumas->total;
                            $ordenes_up->total_pagado = $sumas->abonado;
                            $ordenes_up->save();
                            $ordenes = ordenes::create([
                                'order_id' =>  $orden_consulta,
                                'status' => $importar->status,
                                'users_id' => 0,
                                'estado' => "SISTEMA PAGO",
                                'country' => $importar->country,
                                'email' => $importar->email,
                                'nombre' => $importar->first_name,
                                'apellido' => $importar->last_name,
                                'total_ventas' => 0,
                                'total_pagado' => $importar->total_sales
                            ]);
                        }
                    }else{
                        echo "no tenia array :s";
                    }
                } else {

                }
            }
            unset($items_value,$arr,$arr2, $abonado,$items,$valor);
        }
        }





}
