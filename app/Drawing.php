<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
    //

    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
                            ->where('drawing_id', $this->id)
                            ->first();
    }
}
