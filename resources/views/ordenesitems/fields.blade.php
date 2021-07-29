<!-- Ordenes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ordenes_id', 'Ordenes Id:') !!}
    @if( Session::get('Create') == true)
        {!! Form::number('ordenes_id', Session::get('ORDER_ID'), ['class' => 'form-control']) !!}
    @else
        {!! Form::number('ordenes_id', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Order Item Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_item_id', 'Order Item Id:') !!}
    {!! Form::number('order_item_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Variation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('variation_id', 'Variation Id:') !!}
    {!! Form::number('variation_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::text('cantidad', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Abonado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abonado', 'Abonado:') !!}
    {!! Form::text('abonado', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Personalizacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personalizacion', 'Personalizacion:') !!}
    {!! Form::text('personalizacion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
