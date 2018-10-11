@extends('layouts.app')

@section('content')
    <h1>Edit Drawing</h1>
    {!! Form::open(['action' => ['AdminController@update', $drawing->id], 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $drawing->name, ['class' => 'form-control', 'placeholder' => 'Drawing Name'])}}

        </div>
        <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', $drawing->description, ['class' => 'form-control', 'placeholder' => 'Description of the drawing'])}}
    
        </div>
        <div class="form-group">
                {{Form::label('price', 'Price')}}
                {{Form::text('price', $drawing->price, ['class' => 'form-control', 'placeholder' => 'Price of the drawing'])}}
    
        </div>
        <div class="form-group">
            
                {{Form::file('image')}}
    
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection