<?php

namespace App;
use App\category;
use App\event;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    public function category(){
        return category::find($this->category_id);
    }


    public function event(){
        return event::find($this->event_id);
    }
}
