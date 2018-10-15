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
                            <a href="/admin/drawings/{{$drawing->id}}"><img src="/storage/images/{{$drawing->image}}" style="width:10%" ></a>
                            
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                      <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
                                    </label>
                                    <label class="btn btn-secondary">
                                      <input type="radio" name="options" id="option2" autocomplete="off"> Deactive
                                    </label>
                                  </div>
                    </div>
                     
                    </div>
                    @endforeach

            </div>
        </div>
    </div>
</div>
@endsection

