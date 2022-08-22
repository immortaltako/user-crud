@extends('layouts/app')

@section('content')
    <h1>People</h1>
    <div class="container-center">
        <a class="btn btn-primary" href="/persons/create">
            Add Person<i class="fa fa-plus"></i>
        </a>
    </div>
    @if(count($persons) > 0)
        <div class="content-container">
            @foreach($persons as $person)
                <div class="person-container">
                    <div class="person">
                        <div class="initials">
                            {{substr($person->first_name, 0, 1)}}{{substr($person->last_name, 0, 1)}}
                        </div>
                        <div class="summary">
                            <h4><a href="/persons/{{$person->id}}">{{$person->first_name}} {{$person->last_name}}</a></h4>
                            <a href="/persons/{{$person->id}}" class="learn-more">Learn more <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center py-4">No people found. Click Add Person to get started.</p>
    @endif
@endsection
