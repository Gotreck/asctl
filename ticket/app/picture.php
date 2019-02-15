<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    //

    public static function storeFile($image){
        $path = $image->store('/public/pictures');
        $path=str_replace('public/','',$path);
        $image = new picture();
        $image->link= $path;
        $image->save();
        return $image;
    }
}
