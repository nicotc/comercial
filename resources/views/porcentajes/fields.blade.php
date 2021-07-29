<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Porcentaje Field -->
<div class="form-group col-sm-6">
    {!! Form::label('porcentaje', 'Importe Pendiente:') !!}
    {!! Form::text('porcentaje', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>
