@extends('layouts.app')




@section('content')
@php
    session(['ORDER_ID' => $ordenes->order_id]);
@endphp


<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ordenes Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('ordenes.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('ordenes.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection


@section('third_party_scripts')
<script>
function verestado(){
    $('#verestado').toggle();
}

function verusuario(){
    $('#verusuario').toggle();
}
</script>


@endsection


