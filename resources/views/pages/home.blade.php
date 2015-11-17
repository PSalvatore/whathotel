@extends('layouts.default')
@section('content')

        <p class="reveal"><br> WhatHotel is a site where travelers can connect easily and quickly. Guests staying at a particular
            hotel can provide information to our database that will allow friends, family, or colleagues
            to meet up with them without a hassle. Members of WhatHotel can also make reservations to a particular hotel by clicking the
            <img src="{{ URL::to('/') }}/icons/service_bell.png"> icon found on the 'Hotels' page.</p>
        <div id="picFrame">
            <img class="hotelroomIMG" src="https://palacestation.sclv.com/~/media/Images/Page%20Background%20Images/Palace/Hotel/PS_Hotel_KingRoom_new.jpg"
                 width="420" height="220">
        </div>
        <hr>
        <p id="blurb">Find out what rooms your fellow travelers are in and when their reservation is until!
        </p>
@stop
