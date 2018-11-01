@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h3>My Favorites</h3>
            </div>
            @forelse ($myFavorites as $myFavorite)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $myFavorite->title }}
                    </div>

                    <div class="panel-body">
                            <a href="/drawings/{{$myFavorite->id}}"><img src="/storage/images/{{$myFavorite->image}}" style="width:100%" ></a>
                    </div>
                    @if (Auth::check())
                        <div class="panel-footer">
                            <favorite
                                :drawing={{ $myFavorite->id }}
                                :favorited={{ $myFavorite->favorited() ? 'true' : 'false' }}
                            ></favorite>
                        </div>
                    @endif
                </div>
            @empty
                <p>You have no favorite drawingss.</p>
            @endforelse
         </div>
    </div>
</div>
@endsection