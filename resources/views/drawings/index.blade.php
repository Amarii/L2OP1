@extends('layouts.app')

@section('content')
    <h1>Drawings</h1>
    @if(count($drawings) > 0)

       
            <div class="card-columns" style="column-count:5">
    @foreach($drawings as $drawing)
      
    @if(Auth::guard('admin')->user()) 
    <div class="card">
            <a href="/admin/drawings/{{$drawing->id}}"><img src="/storage/images/{{$drawing->image}}" style="width:100%" ></a>
                    
                    </div>


    @else
        <div class="card">
            <a href="/drawings/{{$drawing->id}}"><img src="/storage/images/{{$drawing->image}}" style="width:100%" ></a>
                    
                    </div>
        
     @endif
        
    @endforeach
    </div>
  
    @else
    <p>No Drawings</p>
    @endif
    @endsection