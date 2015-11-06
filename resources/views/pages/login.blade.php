@extends('layouts.default')
@section('content')

        {!! Form::open(array('url' => 'login')) !!}
        <h1>Login</h1>

        <!-- if there are login errors, show them here -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            {!! Form::label('email', 'Email Address:') !!}
            {!! Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'example@example.com']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class' => 'form-control', 'type' => 'password']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Submit!', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}
@stop
