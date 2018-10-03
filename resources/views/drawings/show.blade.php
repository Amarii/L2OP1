@extends('layouts.app')

@section('content')
    <a href="/drawings" class="btn btn-standard"><- Go Back</a>
    <h1>{{$drawing->name}}</h1>
    <div>
            <p>{{$drawing->description}}</p>
            <p>Price: ${{$drawing->price}}</p>
    </div>
    <hr>
  
@if(Auth::user())
@if(Auth::user()->user_type == 1)
<a href="/drawings/{{$drawing->id}}/edit" class="btn btn-standard float-left">Edit</a>
{!!Form::open(['action' => ['DrawingController@destroy', $drawing->id], 'method' => 'POST', 'class' => 'float-left'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif
@endif
    @endsection