@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h3>My Info</h3>

               <h2>Name: {{$myInfo->name}}</h2>
               <h5>Email: {{$myInfo->email}}</h5>
               <h5>Last Logged in at: {{$myInfo->last_logged_in_at}}</h5>
               <h5>Times Logged in: {{$myInfo->times_logged_in}}</h5>
               <a href="{{ url('edit_my_info') }}">Edit My Info</a>

            </div>
            
         </div>
    </div>
</div>
@endsection