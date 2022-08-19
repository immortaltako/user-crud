@extends('layouts/app')

@section('content')
    <h1>{{$person->first_name}} {{$person->last_name}}</h1>
    <div class="mb-2">
        <a href="/persons" class="btn btn-link"><i class="fa fa-arrow-left"></i> All People</a>
    </div>
    <table class="table">
        <tr>
            <td class="td-label">Full Name:</td>
            <td>{{$person->first_name}} {{$person->last_name}}</td>
        </tr>
        <tr>
            <td class="td-label">Email:</td>
            <td>{{$person->email}}</td>
        </tr>
    </table>
    {!! Form::open(['action' => ['App\Http\Controllers\PersonsController@destroy', $person->id], 'method' => 'POST', 'class' => '']) !!}
        <a href="/persons/{{$person->id}}/edit" class="btn btn-primary">Edit</a>
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
    <hr>
    <small>Last updated {{$person->created_at}}</small>
@endsection
