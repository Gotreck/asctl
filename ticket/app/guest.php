<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * @method static get()
 */
class guest extends Model
{
    //

    public function picture(){
        return DB::table('pictures')->where('id',$this->picture_id)->first();
    }
}
