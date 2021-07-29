
<div class="col-sm-6">
    {!! Form::label('id', 'Order Id:') !!}
    {{ $importar->id }}
</div>


<div class="col-sm-6">
    {!! Form::label('status', 'Estado WP:') !!}
    {{ $importar->status }}
</div>


<div class="col-sm-6">
    {!! Form::label('first_name', 'Nombre:') !!}
    {{ $importar->first_name }}
</div>

<div class="col-sm-6">
    {!! Form::label('last_name', 'Apellido:') !!}
    {{ $importar->last_name }}
</div>

<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {{ $importar->email }}
</div>



<table class="table" style="margin-top: 25px">
    <tr>
        <td>Producto</td>
        <td>Producto ID</td>
        <td>Variación</td>
        <td>Cantidad</td>
        <td>Total</td>
    </tr>
    @foreach ($items as $item)
    <tr>
        @php
            if(!isset($item['name'])){
                $item['name']  = '';
            }
            if(!isset($item['product_id'])){
                $item['product_id']  = '';
            }
            if(!isset($item['variation_id'])){
                $item['variation_id']  = '';
            }
            if(!isset($item['cantidad'])){
                $item['cantidad']  = '';
            }
            if(!isset($item['total'])){
                $item['total']  = '';
            }

        @endphp
        <td> {{ $item['name'] }}</td>
        <td>{{ $item['product_id'] }}</td>
        <td>{{ $item['variation_id'] }}</td>
        <td>{{ $item['cantidad'] }}</td>
        <td>{{ $item['total'] }}</td>
    </tr>
    @endforeach
</table>
<div class="card">


{!! Form::open(['route' => 'importars.store']) !!}

<input type="text" name="id" id="id" value="{{ $importar->id }}">

<div class="card-footer">
    {!! Form::submit('Importar', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}
</div>
