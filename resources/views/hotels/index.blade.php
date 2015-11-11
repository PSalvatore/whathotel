@extends('layouts.default')
@section('content')

    <h1>Hotels 
        @if(Auth::check() && Auth::user()->username === 'admin')
            <a href="hotels/create" style="vertical-align: middle"><img src="{{ URL::to('/') }}/icons/Plus_sign.png"></a>
        @endif
    </h1>
    <div class="table-responsive">
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
            <tbody>
            @if(Auth::check() && Auth::user()->username === 'admin')
                @foreach($hotels as $hotel)
                    <tr>
                        <td><a href={{ url('hotels/delete/'.$hotel->hotel_id) }}><img src="{{ URL::to('/') }}/icons/delete.png"></a>
                            {{$hotel->hotel_id}}
                        </td>
                        <td class="name_col">
                            {!! Form::open(array('url' => 'hotels/update/'.$hotel->hotel_id.'/hotel_name')) !!}
                            <a href={{ url('reservations/create/'.$hotel->hotel_id) }}><img src="{{ URL::to('/') }}/icons/service_bell.png"></a>
                            <img class="icon" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
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
                            <img class="icon" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
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
                            <img class="icon" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
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
                            <img class="icon" id="icon{{$hotel->hotel_id}}" src="{{ URL::to('/') }}/icons/update.png">
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
                @foreach($hotels as $hotel)
                    <tr>
                        <td>{{$hotel->hotel_id}}</td>
                        <td><a href={{ url('reservations/create/'.$hotel->hotel_id) }}><img src="{{ URL::to('/') }}/icons/service_bell.png"></a>
                            {{$hotel->hotel_name}}</td>
                        <td>{{$hotel->nightly_price}}</td>
                        <td>{{$hotel->valet}}</td>
                        <td>{{$hotel->image_name}}</td>
                    </tr>
                @endforeach
            @endif
          </tbody>
        </table>
    </div>

@stop
