@extends('layouts.default')
@section('content')

    <h1>Users 
        @if(Auth::check() && Auth::user()->username === 'admin')
            <a href="users/create" style="vertical-align: middle"><img src="{{ URL::to('/') }}/icons/Plus_sign.png"></a>
        @endif
    </h1>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @if(Auth::check() && Auth::user()->username === 'admin')
                    @foreach($users as $user)
                        <tr>
                            <td><a href={{ url('users/delete/'.$user->id) }}><img src="{{ URL::to('/') }}/icons/delete.png"></a>
                                {{$user->id}}
                            </td>
                            <td class="username_col">
                                {!! Form::open(array('url' => 'users/update/'.$user->id.'/username')) !!}
                                <img class="icon" id="icon{{$user->id}}" src="{{ URL::to('/') }}/icons/update.png">
                                <div class="text" id="text1">{{$user->username}}</div>
                                <div class="input-group edit" id="edit1">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="{{$user->username}}">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">Edit</button>
                                    </span>
                                </div>
                                {!! Form::close() !!}
                            </td>
                            <td class="username_col">
                                {!! Form::open(array('url' => 'users/update/'.$user->id.'/email')) !!}
                                <img class="icon" id="icon{{$user->id}}" src="{{ URL::to('/') }}/icons/update.png">
                                <div class="text" id="text2">{{$user->email}}</div>
                                <div class="input-group edit" id="edit2">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="{{$user->email}}">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">Edit</button>
                                    </span>
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@stop
