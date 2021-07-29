<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->id ==1){
            $sumas = DB::table('ordenes')
            ->select(DB::raw('SUM(ordenes.total_pagado) AS total_pagado'), DB::raw('SUM(ordenes.total_ventas) AS total_ventas'))
            ->where('ordenes.estado', '!=', 'ENVIADO')
            ->where('ordenes.estado', '!=', 'SISTEMA PAGO')
            ->whereNull('deleted_at')
            ->first();

            $cuenta = DB::table('ordenes')
            ->select(DB::raw('count(ordenes.estado) AS cuenta_estado'), 'estado')
            ->whereNull('deleted_at')
            ->groupBy('ordenes.estado')
            ->pluck('cuenta_estado', 'estado');
        }else{
            $sumas = DB::table('ordenes')
            ->select(DB::raw('SUM(ordenes.total_pagado) AS total_pagado'), DB::raw('SUM(ordenes.total_ventas) AS total_ventas'))
            ->where('users_id', '=', Auth::user()->id)
            ->where('ordenes.estado', '!=', 'ENVIADO')
            ->where('ordenes.estado', '!=', 'SISTEMA PAGO')
            ->whereNull('deleted_at')
            ->first();

            $cuenta = DB::table('ordenes')
            ->select(DB::raw('count(ordenes.estado) AS cuenta_estado'), 'estado')
            ->where('users_id', '=', Auth::user()->id)
            ->whereNull('deleted_at')
            ->groupBy('ordenes.estado')
            ->pluck('cuenta_estado', 'estado');
        }



        return view('home', ['sumas' =>$sumas, 'cuenta' => $cuenta ]);



    }
}
