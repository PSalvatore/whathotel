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

    </hr>

    @if(!empty($userMatch))

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
              @foreach($userMatch as $user)
              <?php var_dump($userMatch);
              die(); ?>
              <tbody>
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                </tbody>
              @endforeach
            </table>
        </div>

        </hr>

        <h1>Hotels</h1>
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
            </table>
        </div>

    @else
    @endif

@stop
