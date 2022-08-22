<?php

    $activity_array = [];
    foreach($activities as $k => $v) {
        $activity_array[$k] = $v['title'];
    }
?>

@extends('layouts/app')

@section('content')
    <div class="mb-2">
        <a href="/persons" class="btn btn-link"><i class="fa fa-arrow-left"></i> All People</a>
        <a href="/persons/{{$person->id}}" class="btn btn-link"><i class="fa fa-arrow-left"></i> {{$person->first_name}} {{$person->last_name}} Details</a>
    </div>
    <div class="container-center">
        <div class="initials">{{substr($person->first_name, 0, 1)}}{{substr($person->last_name, 0, 1)}}</div>
        <h1>{{$person->first_name}} {{$person->last_name}}</h1>
    </div>
    {!! Form::open(['action' => ['App\Http\Controllers\PersonsController@update', $person->id], 'method' => 'POST']) !!}
        <div class="form-row">
            <div class="form-group col-md-6">
                {{Form::label('first_name', 'First Name')}}
                {{Form::text('first_name', $person->first_name, ['class' => 'form-control', 'placeholder' => 'First name'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('last_name', 'Last Name')}}
                {{Form::text('last_name', $person->last_name, ['class' => 'form-control', 'placeholder' => 'Last name'])}}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', $person->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {{Form::label('dob', 'Date of Birth')}}
                {{Form::date('dob', $person->dob, ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('eye_color', 'Eye Color')}}
                {{Form::select('eye_color', [
                    'brown' => 'Brown',
                    'blue' => 'Blue',
                    'hazel' => 'Hazel',
                    'green' => 'Green'
                ], $person->eye_color, ['class' => 'form-control', 'placeholder' => 'Pick a color...'])}}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                {{Form::label('activity', 'Favorite Activity/Sport')}}
                {{Form::select('activity', $activity_array, $person->activity, ['class' => 'form-control', 'placeholder' => 'Please choose'])}}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 text-center py-4">
                <a href="/persons/{{$person->id}}" class="btn btn-primary-outline">Cancel</a>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            </div>
        </div>
    {!! Form::close() !!}
@endsection
