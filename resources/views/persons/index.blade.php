@extends('layouts/app')

@section('content')
    <h1>People</h1>
    <a href="/persons/create" class="btn btn-info">Create</a>
    @if(count($persons) > 0)
        @foreach($persons as $person)
            <div class="well">
                <h3><a href="/persons/{{$person->id}}">{{$person->first_name}} {{$person->last_name}}</a></h3>
                <small>Created on {{$person->created_at}}</small>
            </div>
        @endforeach
    @else
        <p>No people found.</p>
    @endif
@endsection
