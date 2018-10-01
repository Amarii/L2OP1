@extends('layouts.app')

@section('content')
    <h1>Drawings</h1>
    @if(count($drawings) > 0)
    @foreach($drawings as $drawing)
        <div class="col-md-4 list-group-item list-group-item-action">
        <h3><a href="/drawings/{{$drawing->id}}">{{$drawing->name}}</a></h3>
        
        </div>
    @endforeach

    @else
    <p>No Drawings</p>
    @endif
    @endsection