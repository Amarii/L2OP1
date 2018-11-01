@extends('layouts.app')

@section('content')

    <a href="/drawings" class="btn btn-standard"><- Go Back</a>
    <h1>{{$drawing->name}}</h1>
   
            <p>Description: {{$drawing->description}}</p>
   
            <p>Price: €{{$drawing->price}}</p>


            @if($drawing->sold == 1)
            sold
            @endif


            <div style="margin-bottom:10px">

<div>

            <div style="text-align:center">
                
         @if(Auth::user() && Auth::user()->is_admin == 0)
 <a style="margin-bottom:10px" class="btn btn-success">Contact Artist</a>

                @else
                @if(Auth::user() && Auth::user()->is_admin == 1)

                <div style="margin-bottom:10px">
                                <a href="/drawings/{{$drawing->id}}/edit" class="btn btn-standard float-left">Edit</a>
                                {!!Form::open(['action' => ['DrawingsController@destroy', $drawing->id], 'method' => 'POST', 'class' => 'float-left'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                                <div>
                                        @endif
         @endif
         
    </div>
    <br>
         <hr>   
    <img style ="width:100%" src="/storage/images/{{$drawing->image}}">
            
    </div>
    <hr>
  





    @endsection