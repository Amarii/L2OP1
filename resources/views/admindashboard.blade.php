@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <h1>Drawings</h1>
                   
                    <div class="card-columns" style="column-count:1">

                            <div class="row">
                            
                    @foreach($drawings as $drawing)


                      <div class="card">
                    

                        
                    <div class="col-sm">
                     
                            

                            {!! Form::open(['action' => ['DrawingsController@isActive', $drawing->id], 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                            <a href="/admin/drawings/{{$drawing->id}}"><img src="/storage/images/{{$drawing->image}}" style="width:10%" ></a>
                            {{Form::submit($drawing->is_active, ['class'=>'btn btn-primary'])}}
                            <a href="/drawings/{{$drawing->id}}/edit" class="btn btn-standard float-left">Edit</a>
                            {!!Form::close()!!}
                            

                            
          
                       
                        {!!Form::open(['action' => ['DrawingsController@destroy', $drawing->id], 'method' => 'POST', 'class' => 'float-left'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    
                        
                           
                    </div>
                     
                    </div>
                    @endforeach

            </div>
        </div>
    </div>
</div>
@endsection

