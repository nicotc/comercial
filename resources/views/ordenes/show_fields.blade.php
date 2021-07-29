<!-- Order Id Field -->
<div class="col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {{ $ordenes->order_id }}
</div>

<!-- Status Field -->
<div class="col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {{ $ordenes->status }}
</div>

<!-- Usuario Field -->
<div class="col-sm-6">
    {!! Form::label('usuario', 'Email:') !!}
    {{ $ordenes->email }}
</div>

<!-- Nombre Field -->
<div class="col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {{ $ordenes->nombre }}
</div>

<!-- Apellido Field -->
<div class="col-sm-6">
    {!! Form::label('apellido', 'Apellido:') !!}
    {{ $ordenes->apellido }}
</div>

<!-- Total Ventas Field -->
<div class="col-sm-6">
    {!! Form::label('total_ventas', 'Total Ventas:') !!}
    {{ $ordenes->total_ventas }}
</div>

<!-- Total Pagado Field -->
<div class="col-sm-6">
    {!! Form::label('total_pagado', 'Total Pagado:') !!}
    {{ $ordenes->total_pagado }}
</div>






<div class="col-sm-6">
    {!! Form::label('Pais', 'Pais:') !!}
    {{ $ordenes->country }}
</div>


<div class="col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {{ $ordenes->fecha }}
</div>

<div class="col-sm-6">
    {!! Form::label('billing_phone', 'billing_phone:') !!}
    {{ $ordenes->billing_phone }}
</div>

<div class="col-sm-6">
    {!! Form::label('shipping_address_1', 'shipping_address_1:') !!}
    {{ $ordenes->shipping_address_1 }}
</div>

<div class="col-sm-6">
    {!! Form::label('shipping_address_2', 'shipping_address_2:') !!}
    {{ $ordenes->shipping_address_2 }}
</div>

<div class="col-sm-6">
    {!! Form::label('shipping_city', 'shipping_city:') !!}
    {{ $ordenes->shipping_city }}
</div>

<div class="col-sm-6">
    {!! Form::label('shipping_state', 'shipping_state:') !!}
    {{ $ordenes->shipping_state }}
</div>

<div class="col-sm-6">
    {!! Form::label('shipping_country', 'shipping_country:') !!}
    {{ $ordenes->shipping_country }}
</div>       
    
<div class="col-sm-6">
    {!! Form::label('shipping_postcode', 'shipping_postcode:') !!}
    {{ $ordenes->shipping_postcode }}
</div>      
           

<div class="col-sm-12">
    {!! Form::label('users_id', 'Asignado:') !!}
    @if( $ordenes->users_id == 0)
        Usuario no asignado
    @else
         {{ $usuarios[$ordenes->users_id] }}
    @endif
    @if(Auth::user()->id == 1 )
        <i class="far fa-eye"  onclick="verusuario()"></i>
    @endif
    
</div>

    <div id="verusuario"  class="col-sm-12" style="display: none">
    {!! Form::model($ordenes, ['route' => ['uorder.update', $ordenes->id], 'method' => 'patch']) !!}
    Cambiar asignación:  {!! Form::select('usuario', $usuarios, null) !!}
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
     {!! Form::close() !!}
    </div>


<div class="col-sm-12" >
    {!! Form::label('estado', 'Estado:') !!}
    {{ $ordenes->estado }}
    <i class="far fa-eye" onclick="verestado()"></i>
</div>

    <div id="verestado" class="col-sm-12" style="display: none">
        {!! Form::model($ordenes, ['route' => ['eorder.update', $ordenes->id], 'method' => 'patch']) !!}
        Cambiar estado: {!! Form::select('estado',  $estados, null) !!}
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

<div class="row"></div>


<div class="col-sm-6">
</div>
    <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('ordenesitems.create') }}">
                        Nuevo item
                    </a>
                </div>

@include('ordenesitems.table')

