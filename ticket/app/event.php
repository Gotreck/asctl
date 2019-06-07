<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ticket;

/**
 * @method static get()
 * @method static first()
 * @method static where(string $string, $id)
 */
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
