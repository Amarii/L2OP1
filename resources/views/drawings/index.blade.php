@extends('layouts.app')

@section('content')
    <h1>Drawings</h1>
    @if(count($drawings) > 0)


    {!! Form::open(['action' => 'DrawingsController@filter', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::select('filter', array(10 => 'Max $10', 20 => 'Max $20', 30 => 'Max $30'))}}
        {{Form::submit('Filter')}}
        {!! Form::close() !!}
       
            <div class="card-columns" style="column-count:5">
    @foreach($drawings as $drawing)
      
  
        <div class="card">
            <a href="/drawings/{{$drawing->id}}"><img src="/storage/images/{{$drawing->image}}" style="width:100%" ></a>
                    
                    </div>
        
  
        
    @endforeach
    </div>
  
    @else
    <p>No Drawings</p>
    @endif
    @endsection