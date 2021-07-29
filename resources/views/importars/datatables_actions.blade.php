@php
    $s = App\Models\ordenes::select(
        'order_id'
    )
    ->where('order_id', '=', $id)
    ->count();

@endphp


<div class='btn-group'>
    @if($s == 0)
        <a href="{{ route('importars.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="fa fa-eye"></i>
        </a>
    @else
        ya se encuentra importado
    @endif

</div>



