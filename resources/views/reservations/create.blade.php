@extends('layouts.default')
@section('content')

        @if(Auth::check())

            <h1>Make Reservation</h1>
            <hr/>
            {!! Form::open(array('url' => 'reservations')) !!}

            <div class="form-group">
                {!! Form::label('nights_qty', 'Number of nights:') !!}
                {!! Form::text('nights_qty', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('start_date', 'Start date:') !!}
                {!! Form::text('start_date', null, array('class' => 'form-control datepicker','id' => 'calendar')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('room_number', 'Room number:') !!}
                {!! Form::text('room_number', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('suite', 'Suite (y/n):') !!}
                {!! Form::text('suite', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('hotel_id', 'What Hotel?: ') !!}
                {!! Form::select('hotel_id', $hotels, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit!', ['class' => 'btn btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}

        @else
            <h1>Must be signed in to make a reservation!</h1>
        @endif

@stop
