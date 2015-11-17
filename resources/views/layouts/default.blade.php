<!DOCTYPE html>
<html>
<head>
  <link href="//fonts.googleapis.com/css?family=Wallpoet:400" rel="stylesheet" type="text/css" >
  <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet" type="text/css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel='stylesheet' type='text/css'>
  <link id="cssLinkID" href="{{ asset('css/mystyle.css?version=1') }}" rel="stylesheet" type="text/css" >
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>WhatHotel</title>
</head>

<body onload="setTheme()">
  <div id="top_container">
    <img id="bg_content_top"  src="http://s12.postimg.org/4ce4k08t9/top.png" width="850" height="161">
  </div>
  <br>

  @if(Auth::check())
    <div id="topbar">
        <div id="logon">
            Welcome, {{$user->username}} | <a href={{url('logout')}}>Logout</a>
        </div>
        <div id="theme">
            Select theme:&nbsp<select onchange="javascript:changeStyle(this.value)">
              <option value="mystyle.css"  >Basic</option>
              <option value="midnight.css" >Midnight</option>
              <option value="grayscale.css"  >Gray Scale</option>
            </select>
        </div>
    </div>
  @else
    <div id="topbar">
        <div id="logon">
            <a href={{url('login')}}>Login</a> | <a href={{url('users/create')}}>Register</a>
        </div>
        @if(Session::has('logout'))
          <a id="alert"> {{ Session::get('message', '') }}</a>
        @endif
        <div id="theme">
            Select theme:&nbsp<select onchange="javascript:changeStyle(this.value)">
              <option value="mystyle.css"  >Basic</option>
              <option value="midnight.css" >Midnight</option>
              <option value="grayscale.css"  >Gray Scale</option>
            </select>
        </div>
    </div>
  @endif

  <div id="container">
    <div id="title">WhatHotel</div>  <!-- finishes off the title div -->
    <ul class="myNav">
      <li><a href="/">Home</a></li>
      <li><a href={{url('reservations')}}>Reservations</a></li>
      <li><a href={{url('hotels')}}>Hotels</a></li>
      <li><a href={{url('users')}}>Guests</a></li>
      <li><a href={{url('search')}}> Search</a></li>
      <li><a href={{url('contact')}}>Contact</a></li>
      <li class="drop"><a>Drop Down</a>
        <ul class="sub-menu">
          <li><a>Option 1</a></li>
          <li><a>Option 2</a></li>
          <li class="drop"><a>Option 3</a>
            <ul class="sub-menu">
              <li><a>Option 3.1</a></li>
              <li><a>Option 3.2</a></li>
              <li><a>Option 3.3</a></li>
              <li><a>Option 3.4</a></li>
            </ul>
          </li>  
          <li><a>Option 4</a></li>
        </ul>
      </li>
      <li><a href="admin">Admin</a></li>
    </ul>
    <div class="newLine"></div>

    <!-- finishes off the nav div -->

    <div id="content">
      <div id="bg_mid">
        <img id="bg_content_left" class="bg_content_sides" src="http://s3.postimg.org/nw4dm64wj/left.png" width="222" height="320">
        <img id="bg_content_right" class="bg_content_sides" src="http://s11.postimg.org/swq5iljwj/right.png" width="222" height="320">
      </div>
      <div class="selected">

        @yield('content')

      <br>
    </div>
  </div> <!-- finishes off the content div -->
</div> <!-- finishes off the container div -->
</div> <!-- finishes off the content div -->

<br>
<div id="footer">Web Site Design by Pat Salvatore</div>
<br>
</div> <!-- finishes off the container div -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/myscript.js') }}"></script>




</body>
</html>
