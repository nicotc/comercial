@extends('layouts.app')


@push('page_css')
<style>
    tr[estado="NEGOCIACIÓN"] > td:nth-child(5)  {
    color: #6610f2!important;
}
tr[estado="PENDIENTE"] > td:nth-child(5) {
    color:  #f012be  !important;
}
tr[estado="TALLER"] > td:nth-child(5) {
    color:  #3c8dbc !important;
}
tr[estado="PENDIENTE DE PAGO"] > td:nth-child(5) {
    color:  #fd7e14 !important;
}
tr[estado="LISTO PARA ENVIAR"] > td:nth-child(5) {
    color:  #d81b60 !important;
}
tr[estado="ENVIADO"] > td:nth-child(5) {
    color:  #01ff70 !important;
}
tr[estado="PRE-NEGOCIACIÓN"] > td:nth-child(5) {
    color:  #6f42c1 !important;
}

</style>
@endpush



@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ordenes</h1>
                </div>
                <div class="col-sm-6">
                 {{--    <a class="btn btn-primary float-right"
                       href="{{ route('ordenes.create') }}">
                        Add New
                    </a> --}}
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('ordenes.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

