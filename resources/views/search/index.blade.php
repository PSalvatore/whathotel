@extends('layouts.default')
@section('content')

    <h1 style=" text-align: center">Search</h1>
    {!! Form::open(array('url' => 'search')) !!}

        <div class="form-group">
            {!! Form::text('searchForm', null, ['class' => 'form-control', 'id' => 'searchBar']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('FIND', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}
    </br>

    </hr>


@stop
