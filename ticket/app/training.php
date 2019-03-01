<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    public function guest(){
        return guest::find($this->guest_id);
    }

    public function event(){
        return event::find($this->event_id);
    }
}
