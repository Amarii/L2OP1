@extends('layouts.app')

@section('content')
    <h1>Drawings</h1>
    @if(count($drawings) > 0)
    @foreach($drawings as $drawing)
        <div class="well">
        <h3><a href="/drawings/{{$drawing->id}}">{{$drawing->name}}</a></h3>
        <small>Posted on {{$drawing->created_at}}</small>
        </div>
    @endforeach

    @else
    <p>No Drawings</p>
    @endif
    @endsection