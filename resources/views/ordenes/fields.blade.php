<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::number('order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Usuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario', 'Usuario:') !!}
    {!! Form::text('usuario', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Total Ventas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_ventas', 'Total Ventas:') !!}
    {!! Form::text('total_ventas', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Total Pagado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_pagado', 'Total Pagado:') !!}
    {!! Form::text('total_pagado', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>