<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\ordenes;
use App\Models\importar;
use App\Models\Porcentajes;
use App\Models\ordenesitems;
use Illuminate\Http\Request;

use App\Models\importar_items;
use Illuminate\Support\Facades\DB;
use App\DataTables\importarDataTable;
use App\Repositories\importarRepository;
use App\Http\Controllers\AppBaseController;

class importarController extends AppBaseController
{
    /** @var  importarRepository */
    private $importarRepository;

    public function __construct(importarRepository $importarRepo)
    {
        $this->importarRepository = $importarRepo;
    }

    /**
     * Display a listing of the importar.
     *
     * @param importarDataTable $importarDataTable
     * @return Response
     */
    public function index(importarDataTable $importarDataTable)
    {
        return $importarDataTable->render('importars.index');
    }

    /**
     * Show the form for creating a new importar.
     *
     * @return Response
     */
    public function create()
    {
        return view('importars.create');
    }

    /**
     * Store a newly created importar in storage.
     *
     * @param CreateimportarRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

 
            $importar = importar::select(
                'yIDN2_wc_order_stats.order_id as id',
                'yIDN2_wc_order_stats.total_sales',
                'yIDN2_wc_order_stats.status',
                'yIDN2_wc_order_stats.customer_id',
                'yIDN2_wc_order_stats.date_created',
                'yIDN2_wc_customer_lookup.user_id',
                'yIDN2_wc_customer_lookup.username',
                'yIDN2_wc_customer_lookup.first_name',
                'yIDN2_wc_customer_lookup.last_name',
                'yIDN2_wc_customer_lookup.email',
                'yIDN2_wc_customer_lookup.country'

                )
                ->join('yIDN2_wc_customer_lookup',
                'yIDN2_wc_order_stats.customer_id',
                '=',
                'yIDN2_wc_customer_lookup.customer_id')
                ->where('order_id', '=', $input['id'])->first();


       
        

            $data_adicional = DB::connection('wp')->table('yIDN2_usermeta')
            ->select('user_id', 'meta_key', 'meta_value')->where('user_id', '=', $importar->user_id )
            ->pluck('meta_value', 'meta_key');

                if(!isset($data_adicional["billing_phone"])){
                    $data_adicional["billing_phone"] = 0;
                }
            
                if(!isset($data_adicional["shipping_address_1"])){
                    $data_adicional["shipping_address_1"] = 0;
                }

                
                if(!isset($data_adicional["shipping_address_2"])){
                    $data_adicional["shipping_address_2"] = 0;
                }

                
                if(!isset($data_adicional["shipping_city"])){
                    $data_adicional["shipping_city"] = 0;
                }

                
                if(!isset($data_adicional["shipping_state"])){
                    $data_adicional["shipping_state"] = 0;
                }
                
                if(!isset($data_adicional["shipping_country"])){
                    $data_adicional["shipping_country"] = 0;
                }

                if(!isset($data_adicional["shipping_postcode"])){
                    $data_adicional["shipping_postcode"] = 0;
                }




                 

            $orders_items =  importar_items::select(
                'yIDN2_woocommerce_order_items.order_item_id',
                'yIDN2_woocommerce_order_items.order_item_name',
                'yIDN2_woocommerce_order_items.order_item_type',
                'yIDN2_woocommerce_order_items.order_id',
                'yIDN2_woocommerce_order_itemmeta.meta_key',
                'yIDN2_woocommerce_order_itemmeta.meta_value')
                ->join('yIDN2_woocommerce_order_itemmeta', 'yIDN2_woocommerce_order_items.order_item_id', '=', 'yIDN2_woocommerce_order_itemmeta.order_item_id')
                ->where('yIDN2_woocommerce_order_items.order_id', '=',  $input['id'])
                ->get();


            foreach ($orders_items as $key => $items) {

              $arr[$items['order_item_id']]['name'] = $items['order_item_name'];
              if($items['meta_key'] == '_product_id' ){
                $sispago = $items['meta_value'];
                $arr[$items['order_item_id']]['product_id'] = $items['meta_value'];
              }
              if($items['meta_key'] == '_variation_id' ){
                $arr[$items['order_item_id']]['variation_id'] = $items['meta_value'];
              }
              if($items['meta_key'] == '_qty' ){
                $arr[$items['order_item_id']]['cantidad'] = $items['meta_value'];
              }
              if($items['meta_key'] == '_line_total' ){
                $arr[$items['order_item_id']]['total'] = $items['meta_value'];
              }
              if($items['meta_key'] == 'Personalizacion' ){
                $arr[$items['order_item_id']]['personalizacion'] = $items['meta_value'];
              }
            }







        if (($sispago != 26411)  or ($sispago != 26440) or ($sispago != 26441) ) {
            $ordenes = ordenes::create([
                'order_id' => $input['id'],
                'status' => $importar->status,
                'users_id' => 0,
                'estado' => "PENDIENTE",
                'country' => $importar->country,
                'email' => $importar->email,
                'nombre' => $importar->first_name,
                'apellido' => $importar->last_name,
                'total_ventas' => $importar->total_sales,
                'total_pagado' => 0,
                'fecha' => $importar->date_created,
                'billing_phone' => $data_adicional["billing_phone"],
                'shipping_address_1' => $data_adicional["shipping_address_1"],
                'shipping_address_2' => $data_adicional["shipping_address_2"],
                'shipping_city' => $data_adicional["shipping_city"],
                'shipping_state' => $data_adicional["shipping_state"],
                'shipping_country' => $data_adicional["shipping_country"],
                'shipping_postcode' => $data_adicional["shipping_postcode"]


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

                $arr[] = $importe_pendiente;
                $abonado[] = $items_value['total'];

                $importar_items = ordenesitems::create([
                    'ordenes_id' => $input['id'],
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

            $ordenes->total_ventas = array_sum($abonado)+array_sum($arr);
            $ordenes->total_pagado = array_sum($abonado);

            if($ordenes->total_ventas ==  $ordenes->total_pagado){
                $ordenes->estado = "PRE-NEGOCIACIÓN";
            }



            $ordenes->save();
        }else{

            foreach($arr as $valor){
               $SistemaDePagos =  $valor['total'];
            }


            $ordenes_activas =  ordenes::where('email', '=', $importar->email)
                                ->where('estado', '!=', "ENVIADO")
                                ->first();


            if(isset($ordenes_activas->order_id)){

               // $SistemaDePagos
             $items =   ordenesitems::select('id', 'total', 'abonado')->where('ordenes_id', '=', $ordenes_activas->order_id )->get();

                foreach($items as $item){
                    $Faltaporpagar =  $item->total - $item->abonado;
                    $SistemaDePagos = $SistemaDePagos - $Faltaporpagar;
                    if( $SistemaDePagos >= 0 ){
                        $or = ordenesitems::find( $item->id);
                        $or->abonado = $item->total;
                        $or->save();
                    }else{
                        $SistemaDePagos = $SistemaDePagos + $Faltaporpagar;
                        $or = ordenesitems::find( $item->id);
                        $or->abonado = $or->abonado + $SistemaDePagos;
                        $or->save();

                    }


                    // cosultar las sumas de las o abonado y de total
                    // y actiualizar en ordenes

                    $sumas = DB::table('ordenes_items')
                    ->select(DB::raw('SUM(ordenes_items.total) AS total'), DB::raw('SUM(ordenes_items.abonado) AS abonado'))
                    ->where('ordenes_id', '=', $ordenes_activas->order_id )
                    ->first();



                    $ordenes_up = ordenes::find($ordenes_activas->id);



                    if($sumas->total == $sumas->abonado ){
                    $ordenes_up->estado = "LISTO PARA ENVIAR";
                    }
                    $ordenes_up->total_ventas = $sumas->total;
                    $ordenes_up->total_pagado = $sumas->abonado;
                    $ordenes_up->save();


                    $or_chequeo = ordenes::where('order_id', '=', $input['id'])->get();
                    $cuenta = $or_chequeo->count();

                    if($cuenta == 0){
                        $ordenes = ordenes::create([
                            'order_id' => $input['id'],
                            'status' => $importar->status,
                            'users_id' => 0,
                            'estado' => "SISTEMA PAGO",
                            'country' => $importar->country,
                            'email' => $importar->email,
                            'nombre' => $importar->first_name,
                            'apellido' => $importar->last_name,
                            'total_ventas' => 0,
                            'total_pagado' => $importar->total_sales,
                            'fecha' => $importar->date_created,
                            'billing_phone' => $data_adicional["billing_phone"],
                            'shipping_address_1' => $data_adicional["shipping_address_1"],
                            'shipping_address_2' => $data_adicional["shipping_address_2"],
                            'shipping_city' => $data_adicional["shipping_city"],
                            'shipping_state' => $data_adicional["shipping_state"],
                            'shipping_country' => $data_adicional["shipping_country"],
                            'shipping_postcode' => $data_adicional["shipping_postcode"]
                        ]);
                    }



                }


            }else{
                $mensaje = "Orden ". $importar->id ." no se puede asignar a ningun pago ";

                Flash::error($mensaje);
                return redirect(route('importars.index'));
               // dd("no hay ordenes");
            }




        }


            $mensaje = "Orden ". $importar->id ." importda de forma correcta";

            Flash::success($mensaje);

            return redirect(route('importars.index'));

    }

    /**
     * Display the specified importar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $importar = importar::select(
            'yIDN2_wc_order_stats.order_id as id',
            'yIDN2_wc_order_stats.total_sales',
            'yIDN2_wc_order_stats.status',
            'yIDN2_wc_order_stats.customer_id',
            'yIDN2_wc_customer_lookup.username',
            'yIDN2_wc_customer_lookup.first_name',
            'yIDN2_wc_customer_lookup.last_name',
            'yIDN2_wc_customer_lookup.email')
            ->join('yIDN2_wc_customer_lookup',
            'yIDN2_wc_order_stats.customer_id',
            '=',
            'yIDN2_wc_customer_lookup.customer_id')
            ->where('order_id', '=', $id)->first();


            $orders_items =  importar_items::select(
            'yIDN2_woocommerce_order_items.order_item_id',
            'yIDN2_woocommerce_order_items.order_item_name',
            'yIDN2_woocommerce_order_items.order_item_type',
            'yIDN2_woocommerce_order_items.order_id',
            'yIDN2_woocommerce_order_itemmeta.meta_key',
            'yIDN2_woocommerce_order_itemmeta.meta_value')
            ->join('yIDN2_woocommerce_order_itemmeta', 'yIDN2_woocommerce_order_items.order_item_id', '=', 'yIDN2_woocommerce_order_itemmeta.order_item_id')
            ->where('yIDN2_woocommerce_order_items.order_id', '=', $id)
            ->get();




            foreach ($orders_items as $key => $items) {
              $arr[$items['order_item_id']]['name'] = $items['order_item_name'];
              if($items['meta_key'] == '_product_id' ){
                $arr[$items['order_item_id']]['product_id'] = $items['meta_value'];
              }
              if($items['meta_key'] == '_variation_id' ){
                $arr[$items['order_item_id']]['variation_id'] = $items['meta_value'];
              }
              if($items['meta_key'] == '_qty' ){
                $arr[$items['order_item_id']]['cantidad'] = $items['meta_value'];
              }
              if($items['meta_key'] == '_line_total' ){
                $arr[$items['order_item_id']]['total'] = $items['meta_value'];
              }
              if($items['meta_key'] == 'Personalizacion' ){
                $arr[$items['order_item_id']]['personalizacion'] = $items['meta_value'];
              }
            }




        if (empty($importar)) {
            Flash::error('Importar not found');

            return redirect(route('importars.index'));
        }

        return view('importars.show', ['items' => $arr])->with('importar', $importar);
    }

    /**
     * Show the form for editing the specified importar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {

      //  dd($id);

/*         $importar = $this->importarRepository->find($id);

        if (empty($importar)) {
            Flash::error('Importar not found');

            return redirect(route('importars.index'));
        } */

     /*    return view('importars.edit')->with('importar', $importar); */
    }

    /**
     * Update the specified importar in storage.
     *
     * @param  int              $id
     * @param UpdateimportarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateimportarRequest $request)
    {
        dd($id);
       /*  $importar = $this->importarRepository->find($id);

        if (empty($importar)) {
            Flash::error('Importar not found');

            return redirect(route('importars.index'));
        }

        $importar = $this->importarRepository->update($request->all(), $id);

        Flash::success('Importar updated successfully.');

        return redirect(route('importars.index')); */
    }

    /**
     * Remove the specified importar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /* $importar = $this->importarRepository->find($id);

        if (empty($importar)) {
            Flash::error('Importar not found');

            return redirect(route('importars.index'));
        }

        $this->importarRepository->delete($id);

        Flash::success('Importar deleted successfully.');

        return redirect(route('importars.index')); */
    }
}
