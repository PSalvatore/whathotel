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



<!-- SEARCH RESULTS FOR USER TABLE -->

    @if($userMatch->isEmpty() === false)

        <h1>Users</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Email</th>
                    </tr>
                </thead>
              @if(Auth::check() && Auth::user()->username === 'admin')
                    @foreach($userMatch as $user)
                        <tr>
                            <td><a href={{ url('users/delete/'.$user->id) }}><img class="btnAnim" src="{{ URL::to('/') }}/icons/delete.png"></a>
                                {{$user->id}}
                            </td>
                            <td class="username_col">
                                {!! Form::open(array('url' => 'users/update/'.$user->id.'/username')) !!}
                                <img class="icon btnAnim" id="icon{{$user->id}}" src="{{ URL::to('/') }}/icons/update.png">
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
                                <img class="icon btnAnim" id="icon{{$user->id}}" src="{{ URL::to('/') }}/icons/update.png">
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

                  @foreach($userMatch as $user)
                  <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                    </tbody>
                  @endforeach
              @endif
            </table>

    @else
    @endif



<!-- SEARCH RESULTS FOR HOTEL TABLE -->

    @if($hotelMatch->isEmpty() === false)
        
        <h1>Hotels</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Nightly Price</th>
                      <th>Valet</th>
                      <th>Image</th>
                    </tr>
                </thead>
                @if(Auth::check() && Auth::user()->username === 'admin')
                @foreach($hotelMatch as $hotel)
                    <tr>
                        <td><a href={{ url('hotels/delete/'.$hotel->hotel_id) }}><img class="btnAnim" src="{{ URL::to('/') }}/icons/delete.png"></a>
                            {{$hotel->hotel_id}}
                        </td>
                        <td class="name_col">
                            {!! Form::open(array('url' => 'hotels/update/'.$hotel->hotel_id.'/hotel_name')) !!}
                            <a href={{ url('reservations/create/'.$hotel->hotel_id) }}><img class="btnAnim" src="{{ URL::to('/') }}/icons/service_bell.png"></a>
                            <img class="icon btnAnim" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
                            <div class="text" id="text1">{{$hotel->hotel_name}}</div>
                            <div class="input-group edit" id="edit1">
                                <input type="text" name="hotel_name" id="hotel_name" class="form-control" placeholder="{{$hotel->hotel_name}}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <td class="price_col">
                            {!! Form::open(array('url' => 'hotels/update/'.$hotel->hotel_id.'/nightly_price')) !!}
                            <img class="icon btnAnim" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
                            <div class="text" id="text2">{{$hotel->nightly_price}}</div>
                            <div class="input-group edit" id="edit2">
                                <input type="text" name="nightly_price" id="nightly_price" class="form-control" placeholder="{{$hotel->nightly_price}}" >
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <td class="valet_col">
                            {!! Form::open(array('url' => 'hotels/update/'.$hotel->hotel_id.'/valet')) !!}
                            <img class="icon btnAnim" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
                            <div class="text" id="text3">{{$hotel->valet}}</div>
                            <div class="input-group edit" id="edit3">
                                <input type="text" name="valet" id="valet" class="form-control" placeholder="{{$hotel->valet}}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <td class="img_col">
                            {!! Form::open(array('url' => 'hotels/update/'.$hotel->hotel_id.'/image_name')) !!}
                            <img class="icon btnAnim" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
                            <div class="text" id="text4">{{$hotel->image_name}}</div>
                            <div class="input-group edit" id="edit4">
                                <input type="text" name="image_name" id="image_name" class="form-control" placeholder="{{$hotel->image_name}}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Edit</button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @else

                @foreach($hotelMatch as $hotel)
                <tbody>
                      <tr>
                        <td>{{$hotel->hotel_id}}</td>
                        <td>{{$hotel->hotel_name}}</td>
                        <td>{{$hotel->nightly_price}}</td>
                        <td>{{$hotel->valet}}</td>
                        <td>{{$hotel->image_name}}</td>
                      </tr>
                  </tbody>
                @endforeach
              @endif
            </table>

    @else
    @endif


<!-- SEARCH RESULTS FOR RESERVATION TABLE -->

    @if($reservationMatch->isEmpty() === false)

        @foreach($reservationMatch as $reservation)

          @if($userMatch->isEmpty() === false)
            <h1>Reservations for {{$reservation->username}}</h1>
          @else($hotelMatch->isEmpty() === false)
            <h1>Reservations for {{$reservation->hotel_name}}</h1>
          @endif

          <?php break; ?>
        @endforeach
      
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
                        @foreach($reservationMatch as $reservation)
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
                                    {!! Form::open(array('url' => 'reservations/update/'.$reservation->reservation_id.'/start_date', 'class' => 'edit_date')) !!}
                                    <img class="icon btnAnim" id="icon{{$reservation->reservation_id}}" src="{{ URL::to('/') }}/icons/update.png">
                                    <div class="text" id="text1">{{$reservation->start_date}}</div> 
                                    <div class="input-group edit" id="edit1">
                                        {!! Form::text('start_date', $reservation->start_date, array('class' => 'form-control datepicker','id' => 'calendar')) !!}                                        
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

                      @foreach($reservationMatch as $reservation)
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

    @else
    @endif

@stop
