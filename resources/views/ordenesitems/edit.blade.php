@extends('layouts.app')

@section('content')

@php
    session(['Create' => false]);

@endphp

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Ordenesitems</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($ordenesitems, ['route' => ['ordenesitems.update', $ordenesitems->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('ordenesitems.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('ordenesitems.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
