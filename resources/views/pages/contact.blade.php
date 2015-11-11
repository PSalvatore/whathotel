@extends('layouts.default')
@section('content')
    <h1 style="text-align: center">Contact</h1>


        {!! Form::open(array('url' => 'contact')) !!}

            <div class="form-group">
                {!! Form::label('name', 'What is your name?') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('sex', 'Sex:') !!}
                <span style="padding-left:1em">Male {!! Form::radio('sex', 'male', ['class' => 'form-control', 'type' => 'radio']) !!}</span>
                <span style="padding-left:1em">Female {!! Form::radio('sex', 'female', ['class' => 'form-control', 'type' => 'radio']) !!}</span>
            </div>

            <div class="form-group">
                {!! Form::label('isStudent', 'Are you a student?') !!}
                <span style="padding-left:1em">{!! Form::checkbox('isStudent', 1, null, ['type' => 'checkbox', 'class' => 'checkbox-inline']) !!}</span>
            </div>

            <div id="year" class="form-group">
                {!! Form::label('college_class', 'What year are you in? ') !!}
                {!! Form::select('college_class',  array(
                  'Fr' => 'Freshman',
                  'So' => 'Sophmore',
                  'Jr' => 'Junior',
                  'Sr' => 'Senior'
                ), null, ['class' => 'form-control', 'type' => 'select']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('suggestion', 'Any comments or suggestions?') !!}
                {!! Form::textarea('suggestion', null, ['class' => 'form-control', 'type' => 'textarea']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit!', ['class' => 'btn btn-primary form-control']) !!}
            </div>

        {!! Form::close() !!}

@stop
