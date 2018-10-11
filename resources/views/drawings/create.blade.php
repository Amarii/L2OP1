@extends('layouts.app')

@section('content')
    <h1>Upload Drawing</h1>
    {!! Form::open(['action' => 'AdminController@store', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Drawing Name'])}}

        </div>
        <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description of the drawing'])}}
    
        </div>
        <div class="form-group">
                {{Form::label('price', 'Price')}}
                {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Price of the drawing'])}}
    
        </div>
        <div class="form-group">
            
                {{Form::file('image')}}
    
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection