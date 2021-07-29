@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div>

    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Є {{$sumas->total_ventas - $sumas->total_pagado }}</h3>
                <p>Total por cobrar</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Total por cobrar </a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Є {{$sumas->total_ventas }}</h3>

                <p>Total ventas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Total ventas</a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Є {{$sumas->total_pagado }}</h3>

                <p>Total pagado</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Total pagado</a>
            </div>
        </div>


    </div>


    <div class="row mb-2">
        <div class="col-sm-12">
          <h5 class="m-0">Estado de las ordenes</h5>
        </div>
    </div>


    <div class="row">
    <div class="col-md-6">
            <div class="info-box mb-3 bg-fuchsia">
                <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">PENDIENTE</span>
                    <span class="info-box-number">
                        {{ $cuenta['PENDIENTE'] ?? '0' }}
                    </span>
                </div>
            </div>
            <div class="info-box mb-3" style="background: #6f42c1; color:white;">
                <span class="info-box-icon"><i class="fas fa-funnel-dollar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">PRE-NEGOCIACIÓN</span>
                    <span class="info-box-number">
                        {{ $cuenta['PRE-NEGOCIACIÓN'] ?? '0' }}
                    </span>
                </div>
            </div>
            <div class="info-box mb-3 bg-indigo">
                <span class="info-box-icon"><i class="fas fa-business-time"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">NEGOCIACIÓN</span>
                    <span class="info-box-number">
                        {{ $cuenta['NEGOCIACIÓN'] ?? '0' }}
                    </span>
                </div>
            </div>
            <div class="info-box mb-3 bg-lightblue">
                <span class="info-box-icon"><i class="fas fa-puzzle-piece"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">TALLER</span>
                    <span class="info-box-number">
                        {{ $cuenta['TALLER'] ?? '0' }}
                    </span>
                </div>
            </div>
      </div>

      <div class="col-md-6">

        <div class="info-box mb-3 bg-orange">
            <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PENDIENTE DE PAGO</span>
                <span class="info-box-number">
                    {{ $cuenta['PENDIENTE DE PAGO'] ?? '0' }}
                </span>
            </div>
        </div>
        <div class="info-box mb-3 bg-maroon">
            <span class="info-box-icon"><i class="fas fa-truck"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">LISTO PARA ENVIAR </span>
                <span class="info-box-number">
                    {{ $cuenta['LISTO PARA ENVIAR'] ?? '0' }}
                </span>
            </div>
        </div>
        <div class="info-box mb-3 bg-lime">
            <span class="info-box-icon"><i class="far fa-heart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">ENVIADO</span>
                <span class="info-box-number">
                    {{ $cuenta['ENVIADO'] ?? '0' }}
                </span>
            </div>
        </div>
  </div>
</div>
</div>
@endsection
