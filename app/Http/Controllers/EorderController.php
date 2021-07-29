<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\ordenes;
use App\Models\ordenesitems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $estadox = [
            0 =>'PENDIENTE',
            1 =>'NEGOCIACIÓN',
            2 =>'TALLER',
            3 =>'PENDIENTE DE PAGO',
            4 =>'LISTO PARA ENVIAR',
            5 =>'ENVIADO',
            6 =>'PRE-NEGOCIACIÓN'
        ];


        $idiomas_template = [
            'ES' => 'es',
            'GB' => 'gb',
            'FR' => 'fr'];



        $ordenes = ordenes::find($id);
        $ordenes->estado = $estadox[$request['estado']];
        $ordenes->save();


        $estado_template = [
            'PENDIENTE' => null,
            'NEGOCIACIÓN' => 'negociacion',
            'TALLER' => null,
            'PENDIENTE DE PAGO' => 'pendientepago',
            'LISTO PARA ENVIAR' => null,
            'ENVIADO' => null,
            'PRE-NEGOCIACIÓN'=> null,
        ];

        $user = User::select('name', 'email' )->where('id', '=',$ordenes->users_id )->first();


        $idioma = $idiomas_template[$ordenes->country];
        $estado = $estado_template[$estadox[$request['estado']]];



        if ($estado != null) {
            $data['estado'] = $estado;
           // if ($estado == 'negociacion') {

                if($idioma == 'es'){
                    $data['subject'] = "CONFIRMACIÓN DE PEDIDO AG10MOTO";
                }
                if($idioma == 'gb'){
                    $data['subject'] = "OREDER CONFIRMATION AG10MOTO";
                }
                if($idioma == 'fr'){
                    $data['subject'] = "COMMANDE AG10MOTO";
                }


           // }elseif($estado  =='pendientepago'){
           //     if($idioma == 'es'){
           //         $data['subject'] = "PENDIENTE DE PAGO";
           //     }
          //      if($idioma == 'gb'){
          //          $data['subject'] = "OUTSTANDING";
          //      }
          //      if($idioma == 'fr'){
          //          $data['subject'] = "EXCEPTIONNEL";
         //       }

          // }






            $data['importe'] = $ordenes->total_ventas - $ordenes->total_pagado;
            $data['user_mail'] = $user->email;
            $data['user_name'] = $user->name;
            $data['customer_name'] = $ordenes->nombre." ".$ordenes->apellido;
            $data['customer_mail'] = $ordenes->email;
            $data['template'] = "emails.".$estado.".".$idioma;


            //\MultiMail::to($data['customer_mail'])->from($data['user_mail'])->send(new \App\Mail\Invitation($data));


        list ($mailer,  $dominio) = explode("@", $data['user_mail']);
            Mail::mailer($mailer)->send($data['template'], ['data' => $data ], function ($m) use ($data) {
                $m->from($data['user_mail'], 'ag10moto');
                $m->to($data['customer_mail'], $data['customer_name'])->subject($data['subject']);
            });
        }

        $ordenesitems =   ordenesitems::select(
            'ordenes_items.id',
            'ordenes_items.ordenes_id',
            'ordenes_items.order_item_id',
            'ordenes_items.name',
            'ordenes_items.product_id',
            'ordenes_items.variation_id',
            'ordenes_items.cantidad',
            'ordenes_items.total',
            'ordenes_items.abonado',
            'ordenes_items.personalizacion',
            'ordenes_items.created_at',
            'ordenes_items.updated_at',
            'ordenes_items.deleted_at'
        )->where('ordenes_id', '=', $ordenes->order_id )->get();

        $usuarios = User::pluck('email','id');




        $estados = [
            'PENDIENTE',
            'NEGOCIACIÓN',
            'TALLER',
            'PENDIENTE DE PAGO',
            'LISTO PARA ENVIAR',
            'ENVIADO',
            'PRE-NEGOCIACIÓN'
        ];

        if (empty($ordenes)) {
            Flash::error('Ordenes not found');

            return redirect(route('ordenes.index'));
        }

        return view('ordenes.show', ['ordenesitems' => $ordenesitems, 'usuarios' => $usuarios, 'estados'=>$estados])->with('ordenes', $ordenes);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
