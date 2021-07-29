<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    {!! Form::number('parent_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Created Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_created', 'Date Created:') !!}
    {!! Form::text('date_created', null, ['class' => 'form-control','id'=>'date_created']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_created').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Date Created Gmt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_created_gmt', 'Date Created Gmt:') !!}
    {!! Form::text('date_created_gmt', null, ['class' => 'form-control','id'=>'date_created_gmt']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_created_gmt').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Num Items Sold Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_items_sold', 'Num Items Sold:') !!}
    {!! Form::number('num_items_sold', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Sales Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_sales', 'Total Sales:') !!}
    {!! Form::number('total_sales', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_total', 'Tax Total:') !!}
    {!! Form::number('tax_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipping_total', 'Shipping Total:') !!}
    {!! Form::number('shipping_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Net Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('net_total', 'Net Total:') !!}
    {!! Form::number('net_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Returning Customer Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('returning_customer', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('returning_customer', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('returning_customer', 'Returning Customer', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    {!! Form::number('customer_id', null, ['class' => 'form-control']) !!}
</div>