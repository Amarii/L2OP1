@extends('layouts.app')

@section('content')
    <h1>Drawings</h1>
    @if(count($drawings) > 0)

       
            <div class="card-columns" style="column-count:5">
    @foreach($drawings as $drawing)
      
      
        <div class="card">
            <a href="/admin/drawings/{{$drawing->id}}"><img src="/storage/images/{{$drawing->image}}" style="width:100%" ></a>
                    
                    </div>
        
     
        
    @endforeach
    </div>
  
    @else
    <p>No Drawings</p>
    @endif
    @endsection