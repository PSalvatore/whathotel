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

        <script>
            function setCookieValue(name, value, days) {
                alert("Adding (to cookie): " + name + " = " + value + "\n\n" + "will last " + days + " days");
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    var expires = "; expires=" + date.toGMTString();
                }
                else
                    var expires = "";
                document.cookie = name + "=" + value + expires + "; path=/";
            }

            function getCookieValue(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ')
                        c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0)
                        return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            function eraseCookieValue(name) {
                setCookieValue(name, "", -1);
            }

            function showCookieValue(name) {
                var val = getCookieValue(name);
                if (val == null) {
                    alert("There is no cookie value named '" + name + "'");
                }
                else {
                    alert(name + " = " + val);
                }
            }

            function showWholeCookie() {
                alert("whole cookie is " + document.cookie);
            }

            function changeStyle(choice) {
                // choice is the select list, an object, which has a value property
                // alert ("user choice is " + choice.value);
                document.getElementById('cssLinkID').href = choice.value;
            }
        </script>

@stop
