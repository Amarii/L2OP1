@extends('layouts.app')

@section('content')        
    <h1>Drawings</h1>
    @if(count($drawings) > 0)
        <ul class="list-group">
            @foreach($drawings as $drawing)
                <li class="list-group-item">{{$drawing}}</li>
            @endforeach
        </ul>
    @endif
@endsection