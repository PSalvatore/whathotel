@extends('layouts.default')
@section('content')
        <h1 style=" text-align: center">Welcome to the Admin page, <b>{{$username}}</b>.</h1>
        <p>Administrative Privileges:
        	<ul>
        		<li><img src="{{ URL::to('/') }}/icons/Plus_sign.png"> Ability to add records to table</li>
        		<li><img src="{{ URL::to('/') }}/icons/delete.png"> Ability to delete records from table</li>
        		<li><img src="{{ URL::to('/') }}/icons/update.png"> Ability to edit fields of records</li>
        	</ul>

        </p>
@stop
