@extends('layouts.app')

@section('content')
    <a href="/drawings" class="btn btn-default">Go Back</a>
    <h1>{{$drawing->name}}</h1>
    <div>
            <p>{{$drawing->description}}</p>
            <p>Price: ${{$drawing->price}}</p>
    </div>
    <hr>
    <small>Created on {{$drawing->created_at}}</small>
    @endsection