<?php

namespace App;

use App\role; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class user extends Model
{
    //
    protected $fillable = ['first_name', 'last_name', 'country', 'club', 'email', 'password'];


    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user');
    }

    public function addRole($rolename)
    {
        $role = role::where('name', $rolename)->first();
        $this->roles()->attach($role->id);

    }

    public function hasRole($rolename)
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if (strtolower($role->name) == strtolower($rolename)) {
                return true;
            }
        }

    }

    public function orders(){
        return $this->hasMany('App\order','user_id')->orderby('updated_at','desc');
    }
 
    public function cart(){
        foreach ($this->orders as $order) {
            if(!$order->validate){
                return $order;
            }
        }
        $cart = new order();
        $cart->validate=0;
        $cart->user_id=$this->id;
        $cart->save();
        return $cart;

    }

    public function oldCart(){
        $orders = array();
        foreach ($this->orders as $order) {
            if($order->validate){
                array_push($orders, $order);
            }
        }
        return $orders;
    }


    public function oneCart($cartid){       
        foreach ($this->orders as $order) {
            if($order->id == $cartid){
                return $order;
            }
        }
    }
}
