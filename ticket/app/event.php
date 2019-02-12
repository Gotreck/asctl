<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ticket;

class event extends Model
{
    public function tickets(){
        return ticket::where('event_id',$this->id)->get();
    }
}
