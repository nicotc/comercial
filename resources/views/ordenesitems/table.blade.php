<div class="table-responsive">
    <table class="table" id="ordenesitems-table">
        <thead>
            <tr>
                <th>Producto</th>
            {{--     <th>Ordenes Id</th> --}}
        <th>Orden Item Id</th>
        <th>Producto Id</th>
       <th>Variation Id</th>
  <th>Personalizacion</th> 
        <th>Cantidad</th>
        <th>Total</th>
        <th>Abonado</th>

                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ordenesitems as $ordenesitems)
            <tr>
            <td>{{ $ordenesitems->name }}</td>

              {{--   <td>{{ $ordenesitems->ordenes_id }}</td> --}}
            <td>{{ $ordenesitems->order_item_id }}</td>

            <td>{{ $ordenesitems->product_id }}</td>
          <td>{{ $ordenesitems->variation_id }}</td>
            <td>{{ $ordenesitems->personalizacion }}</td>

           <td>{{ $ordenesitems->cantidad }}</td>
            <td>{{ $ordenesitems->total }}</td>
            <td>{{ $ordenesitems->abonado }}</td>

                <td width="120">
                    {!! Form::open(['route' => ['ordenesitems.destroy', $ordenesitems->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                       {{--  <a href="{{ route('ordenesitems.show', [$ordenesitems->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a> --}}
                         <a href="{{ route('ordenesitems.edit', [$ordenesitems->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
