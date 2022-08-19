@extends('layouts/app')

@section('content')

    <div class="container-center">
        <div class="initials" style="margin:auto;">KG</div>
        <h1>{{$person->first_name}} {{$person->last_name}}</h1>
        <div class="mb-2">
            <a href="/persons" class="btn btn-link"><i class="fa fa-arrow-left"></i> All People</a>
        </div>
        <ul>
            <li>Name: {{$person->first_name}} {{$person->last_name}}</li>
            <li>Email: {{$person->email}}</li>
        </ul>
    </div>
    <div class="details-container">
        <div class="detail-container">
            <div class="detail">
                <div class="value">{{$person->age}}</div>
                <div class="label">Age</div>
            </div>
         </div>
        <div class="detail-container">
            <div class="detail">
                <div class="value"><img src="/img/gemini.png" height="80" width="80" /></div>
                <div class="label">Sign ({{$person->sign}})</div>
            </div>
        </div>
        <div class="detail-container">
            <div class="detail">
                <div class="value"><i class="icon fa fa-eye eye-color-{{$person->eye_color}}"></i></div>
                <div class="label">Eye Color ({{$person->eye_color}})</div>
            </div>
        </div>
        <div class="detail-container">
            <div class="detail">
                <div class="value"><i class="icon fa fa-running"></i></div>
                <div class="label">Favorite Activity (Running)</div>
            </div>
        </div>
    </div>
    {!! Form::open(['action' => ['App\Http\Controllers\PersonsController@destroy', $person->id], 'method' => 'POST', 'class' => '']) !!}
        <a href="/persons/{{$person->id}}/edit" class="btn btn-primary">Edit</a>
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
    <hr>
    <small>Last updated {{$person->created_at}}</small>
@endsection
