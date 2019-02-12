<?php

namespace App;
use App\user;

use Illuminate\Database\Eloquent\Model;

class comandedtickets extends Model
{
    public function user(){
        return user::find($this->user_id);
    }

    public function order(){
        return order::find($this->order_id);
    }

    public function type(){
        return ticket::find($this->ticket_type_id);
    }
}
