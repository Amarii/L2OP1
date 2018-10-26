<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function likes(){
        return $this->belongsTo('App\Likes');
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE","%$keyword%")
                    ->orWhere("email", "LIKE", "%$keyword%")
                    ->orWhere("blood_group", "LIKE", "%$keyword%")
                    ->orWhere("phone", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
