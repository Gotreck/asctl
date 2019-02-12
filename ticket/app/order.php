<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class order extends Model
{
    public function tickets(){
       return $this->hasMany('App\comandedtickets','order_id');
    }

    public function price(){
        $price=0;
        foreach ($this->tickets as $p) {
            $price+=$p->price*$p->pivot->quantity;
        }
        return $price;
    }
    public function addticket($ticketid,$quantity){
        
        DB::table('comandedtickets')->where('order_id' , $this->id)->where('ticket_type_id' , $ticketid)->delete();
        
        

            for ($i=0; $i < $quantity; $i++) { 
                DB::table('comandedtickets')->insert([
                    ['order_id' => $this->id, 'ticket_type_id' => $ticketid ]]);
            }
               
            
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
