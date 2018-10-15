@extends('layouts.app')

@section('content')

    <a href="/drawings" class="btn btn-standard"><- Go Back</a>
    <h1>{{$drawing->name}}</h1>
   
            <p>Description: {{$drawing->description}}</p>
   
            <p>Price: €{{$drawing->price}}</p>


            <div style="margin-bottom:10px">
<a href="/admin/drawings/{{$drawing->id}}/edit" class="btn btn-standard float-left">Edit</a>
{!!Form::open(['action' => ['AdminController@destroy', $drawing->id], 'method' => 'POST', 'class' => 'float-left'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
<div>

            <div style="text-align:center">
                
sdfsdf
         
    </div>
    <br>
         <hr>   
    <img style ="width:100%" src="/storage/images/{{$drawing->image}}">
            
    </div>
    <hr>
  





    @endsection