@extends('layouts/app')

@section('content')
    <h1>Create Person</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\PersonsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('first_name', 'First Name')}}
            {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'First name'])}}
        </div>
        <div class="form-group">
            {{Form::label('last_name', 'Last Name')}}
            {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Last name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('dob', 'Date of Birth')}}
            {{Form::date('dob', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('eye_color', 'Eye Color')}}
            {{Form::select('eye_color', [
                'brown' => 'Brown',
                'blue' => 'Blue',
                'hazel' => 'Hazel',
                'green' => 'Green'
            ], null, ['class' => 'form-control', 'placeholder' => 'Pick a color...'])}}
        </div>
        {{Form::submit('Add Person', ['class' => 'btn btn-primary'])}}
        <a href="/persons" class="btn btn-info">Cancel</a>
    {!! Form::close() !!}
@endsection
