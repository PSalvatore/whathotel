@extends('layouts.default')
@section('content')

        <h1>Reservations 
            @if(Auth::check() && Auth::user()->username === 'admin')
                <a href="reservations/create" style="vertical-align: middle"><img class="btnAnim" src="{{ URL::to('/') }}/icons/Plus_sign.png"></a>
            @endif
        </h1>        

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Hotel</th>
                      <th>Nights</th>
                      <th>Start Date</th>
                      <th>Room #</th>
                      <th>Suite</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Auth::check() && Auth::user()->username === 'admin')
                        @foreach($reservations as $reservation)
                            <tr>
                                <td><a href={{ url('reservations/delete/'.$reservation->reservation_id) }}><img class="btnAnim" src="{{ URL::to('/') }}/icons/delete.png"></a>
                                    {{$reservation->reservation_id}}
                                </td>
                                <td class="username_col">   
                                    {!! Form::open(array('url' => 'reservations/update/'.$reservation->reservation_id.'/user_id')) !!} 
                                    <img class="icon btnAnim" id="icon{{$reservation->reservation_id}}" src="{{ URL::to('/') }}/icons/update.png">
                                    <div class="text" id="text1">{{$reservation->username}}</div>
                                    <div class="input-group edit" id="edit1">
                                        {!! Form::select('user_id', $users, $reservation->user_id, ['class' => 'form-control']) !!}
                                        <span class="input-group-btn" id="shift-btn">
                                            <button type="submit" class="btn btn-default">Edit</button>
                                        </span>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td class="hotel_name_col">
                                    {!! Form::open(array('url' => 'reservations/update/'.$reservation->reservation_id.'/hotel_id')) !!}
                                    <img class="icon btnAnim" id="icon{{$reservation->reservation_id}}" src="{{ URL::to('/') }}/icons/update.png">
                                    <div class="text" id="text1">{{$reservation->hotel_name}}</div>
                                    <div class="input-group edit" id="edit1">
                                        {!! Form::select('hotel_id', $hotels, $reservation->hotel_id, ['class' => 'form-control']) !!}
                                        <span class="input-group-btn" id="shift-btn">
                                            <button type="submit" class="btn btn-default">Edit</button>
                                        </span>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td class="qty_col">
                                    {!! Form::open(array('url' => 'reservations/update/'.$reservation->reservation_id.'/nights_qty')) !!}
                                    <img class="icon btnAnim" id="icon{{$reservation->reservation_id}}" src="{{ URL::to('/') }}/icons/update.png">
                                    <div class="text" id="text1">{{$reservation->nights_qty}}</div>
                                    <div class="input-group edit" id="edit1">
                                        <input type="text" name="nights_qty" id="nights_qty" class="form-control" placeholder="{{$reservation->nights_qty}}">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default">Edit</button>
                                        </span>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td class="start_date_col">
                                    {!! Form::open(array('url' => 'reservations/update/'.$reservation->reservation_id.'/start_date')) !!}
                                    <img class="icon btnAnim" id="icon{{$reservation->reservation_id}}" src="{{ URL::to('/') }}/icons/update.png">
                                    <div class="text" id="text1">{{$reservation->start_date}}</div> 
                                    <div class="input-group edit" id="edit1">
                                        <input type="text" name="start_date" id="start_date" class="form-control" placeholder="{{$reservation->start_date}}">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default">Edit</button>
                                        </span>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td class="room_number_col">
                                    {!! Form::open(array('url' => 'reservations/update/'.$reservation->reservation_id.'/room_number')) !!}
                                    <img class="icon btnAnim" id="icon{{$reservation->reservation_id}}" src="{{ URL::to('/') }}/icons/update.png">
                                    <div class="text" id="text1">{{$reservation->room_number}}</div>
                                    <div class="input-group edit" id="edit1">
                                        <input type="text" name="room_number" id="room_number" class="form-control" placeholder="{{$reservation->room_number}}">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default">Edit</button>
                                        </span>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td class="suite_col">
                                    {!! Form::open(array('url' => 'reservations/update/'.$reservation->reservation_id.'/suite')) !!}
                                    <img class="icon btnAnim" id="icon{{$reservation->reservation_id}}" src="{{ URL::to('/') }}/icons/update.png">
                                    <div class="text" id="text1">{{$reservation->suite}}</div>
                                    <div class="input-group edit" id="edit1">
                                        <input type="text" name="suite" id="suite" class="form-control" placeholder="{{$reservation->suite}}">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default">Edit</button>
                                        </span>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{$reservation->reservation_id}}</td>
                                <td>{{$reservation->username}}</td>
                                <td>{{$reservation->hotel_name}}</td>
                                <td>{{$reservation->nights_qty}}</td>
                                <td>{{$reservation->start_date}}</td>
                                <td>{{$reservation->room_number}}</td>
                                <td>{{$reservation->suite}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

@stop
