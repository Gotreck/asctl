<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class order extends Model
{
    public function ticket(){
        return $this->belongsToMany('App\ticket','ticket_order')->withPivot('quantity');
    }

    public function price(){
        $price=0;
        foreach ($this->tickets as $p) {
            $price+=$p->price*$p->pivot->quantity;
        }
        return $price;
    }
    public function addticket($ticketid,$quantity){
        
        DB::table('ticket_order')->where('order_id' , $this->id)->where('ticket_id' , $ticketid)->delete();
        
        DB::table('ticket_order')->insert([
            ['order_id' => $this->id, 'ticket_id' => $ticketid ,'quantity'=>$quantity]
            
            ]);
            
    }


    public function totalarticles(){
        $total = 0;
        foreach($this->tickets as $p){
            $total+=$p->pivot->quantity;

        }
        return $total;
    }

    public function user(){
        return user::find($this->user_id);
    }


    public function purchase(){
        $connected = false;
        if(session()->has('user')){
            $user=user::find(session()->get('user')[0]);
            $connected=true;
        }
        
        if($connected && $this->totalarticles()){
            $this->validate=true;
            $this->save();
            $title = "Commande N° $this->id";
            $order =$this;
           
            $content = view('mail.order',compact('order'));
            $this->user()->sendMail($title,$content);
            foreach(user::get() as $user){
                if($user->hasRole('Admin')){
                    $user->sendMail($title,$content);
                    
                }
            }
        }
         
        
    }




}
