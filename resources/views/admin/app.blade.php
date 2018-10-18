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
                    @if($drawing->active == false)
                    @php
                    $active = 'Deactive'
                    @endphp
                    @else
                    @php
                    $active = 'Active'
                    @endphp
                    @endif

                      <div class="card">
                    

                        
                    <div class="col-sm">
                     
                            

                            {!! Form::open(['action' => ['AdminController@isActive', $drawing->id], 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                            <a href="/admin/drawings/{{$drawing->id}}"><img src="/storage/images/{{$drawing->image}}" style="width:10%" ></a>
                            {{Form::submit($active, ['class'=>'btn btn-primary'])}}
                        {!! Form::close() !!}
                           
                    </div>
                     
                    </div>
                    @endforeach

            </div>
        </div>
    </div>
</div>
@endsection

