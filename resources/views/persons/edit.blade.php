@extends('layouts/app')

@section('content')
    <h1>Edit Person</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\PersonsController@update', $person->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('first_name', 'First Name')}}
            {{Form::text('first_name', $person->first_name, ['class' => 'form-control', 'placeholder' => 'First name'])}}
        </div>
        <div class="form-group">
            {{Form::label('last_name', 'Last Name')}}
            {{Form::text('last_name', $person->last_name, ['class' => 'form-control', 'placeholder' => 'Last name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $person->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        <a href="/persons" class="btn btn-info">Cancel</a>
    {!! Form::close() !!}
@endsection
