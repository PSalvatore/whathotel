@extends('layouts.default')
@section('content')

        <h1>Create Account</h1>
        <hr/>
        {!! Form::open(array('url' => 'users')) !!}

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
            {!! Form::label('username', 'Username:') !!}
            {!! Form::text('username', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class' => 'form-control', 'type' => 'password']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('re-enter', 'Re-enter Password:') !!}
            {!! Form::password('re-enter', ['class' => 'form-control', 'type' => 'password']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Submit!', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}

@stop
