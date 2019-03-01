<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ticket;

class event extends Model
{
    public function tickets(){
        return ticket::where('event_id',$this->id)->get();
    }

    public function guest(){
        return $this->hasMany('App\guest','event_id');
    }

    public function training(){
        return $this->hasMany('App\training','event_id');
    }
}
