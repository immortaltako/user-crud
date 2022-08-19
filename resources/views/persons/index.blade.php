@extends('layouts/app')

@section('content')
    <h1>People</h1>
    @if(count($persons) > 0)
        <div class="content-container">
            <div class="person-container">
                <a class="person add" href="/persons/create">
                    Add <i class="fa fa-plus"></i>
                </a>
            </div>
            @foreach($persons as $person)
                <div class="person-container">
                    <a class="person" href="/persons/{{$person->id}}">
                        <h3>{{$person->first_name}} {{$person->last_name}}</h3>
                        <h5>{{$person->email}}</h5>
                        <small>Created on {{$person->created_at}}</small>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p>No people found.</p>
    @endif
@endsection
