@extends('layouts/app')

@section('content')
    <a href="/persons" class="btn btn-default">Go Back</a>
    <h1>{{$person->first_name}} {{$person->last_name}}</h1>
    <div>
        {{$person->email}}
    </div>
    <hr />
    <small>Written on {{$person->created_at}}</small>
    <hr>
    <a href="/persons/{{$person->id}}/edit" class="btn btn-default">Edit</a>
    {!! Form::open(['action' => ['App\Http\Controllers\PersonsController@destroy', $person->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection
