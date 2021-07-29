@section('third_party_stylesheets')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@section('third_party_scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@show