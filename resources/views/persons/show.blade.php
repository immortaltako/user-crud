@extends('layouts/app')

@section('content')
    <div class="mb-2">
        <a href="/persons" class="btn btn-link"><i class="fa fa-arrow-left"></i> All People</a>
    </div>
    <div class="container-center">
        <div class="initials">{{substr($person->first_name, 0, 1)}}{{substr($person->last_name, 0, 1)}}</div>
        <h1>{{$person->first_name}} {{$person->last_name}}</h1>
        <ul class="list-group borderless">
            <li class="list-group-item"><b>Name:</b> {{$person->first_name}} {{$person->last_name}}</li>
            <li class="list-group-item"><b>Email:</b> {{$person->email}}</li>
        </ul>
    </div>
    <div class="details-container">
        <div class="detail-container">
            <div class="detail">
                <div class="value">{{$person->age}}</div>
                <div class="label">years old</div>
            </div>
         </div>
        <div class="detail-container">
            <div class="detail">
                <div class="value"><img src="/img/{{$person->sign}}.png" /></div>
                <div class="label">{{$person->sign}}</div>
            </div>
        </div>
        <div class="detail-container">
            <div class="detail">
                <div class="value"><i class="icon fa fa-eye eye-color-{{$person->eye_color}}"></i></div>
                <div class="label">{{$person->eye_color}} eyes</div>
            </div>
        </div>
        <div class="detail-container">
            <div class="detail">
                <div class="value"><i class="icon fa fa-{{$person->activity_icon}}"></i></div>
                <div class="label">loves {{$person->activity_title}}</div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-center">
        {!! Form::open(['action' => ['App\Http\Controllers\PersonsController@destroy', $person->id], 'method' => 'POST', 'class' => '']) !!}
            <a href="/persons/{{$person->id}}/edit" class="btn btn-primary">Edit</a>
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!}
    </div>
    <div class="container-center last-updated">
        <small>Last updated {{$person->created_at}}</small>
    </div>
@endsection
