<?php

namespace App;
use App\category;
use App\event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ticket extends Model
{
    public function category(){
        return category::find($this->category_id);
    }


    public function event(){
        return event::find($this->event_id);
    }

    public function orders(){
        return $this->belongsToMany('App\order','product_order','product_id','order_id');
    }

    public function picture(){
        return DB::table('pictures')->where('id',$this->picture_id)->first();
    }
    

}
