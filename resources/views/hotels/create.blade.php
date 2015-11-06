@extends('layouts.default')
@section('content')

        <h1>Add Hotel</h1>
        <hr/>
        {!! Form::open(array('url' => 'hotels')) !!}
        
        <div class="form-group">
            {!! Form::label('hotel_name', 'Hotel name:') !!}
            {!! Form::text('hotel_name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nightly_price', 'Nightly price:') !!}
            {!! Form::text('nightly_price', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('valet', 'Valet:') !!}
            {!! Form::text('valet', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('image_name', 'Image name:') !!}
            {!! Form::text('image_name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add!', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}

@stop
