<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\ticket;
use App\category;
use App\event;
use App\picture;

class TicketController extends Controller
{
    //
    public function create()
    {
        if (session()->has('user'))
        {
            if(user::find(session()->get('user')[0])->hasRole('admin'))
            {
                $categorys = category::get();
                $events = event::get();
        
                return view("ticket.create", compact('categorys'), compact('events'));

            }

        }
        return redirect("/event");
    }


    public function store()
    {

      $user = user::find(session()->get('user')[0]);

      //errors placed inside an array
      $errors = array();
      //error if the user is not connected
      if(!$user->hasRole('admin')){
          array_push($errors,"Vous devez être admin pour créer un ticket");
      }

      //error if one of fields belows is not completed
      if(empty(request()->name)|| empty(request()->date) || empty(request()->description) || empty(request()->price) ){
          array_push($errors,"Merci de compléter tout les champs");

      }



        $file = request()->file('image');
      if($file){
         $size = $file->getSize();
       if($size > 5242880){
            array_push($errors, "Le fichier est trop volumineux");
        }
        $ext = $file->getClientOriginalExtension();
        if(!preg_match('/(jpg|jpeg|gif|png)$/',$ext)){
           array_push($errors,'Seuls les gif png , jpg ou kpeg sont acceptés');
        }
       }




       //print the error in ticket create page
       if (sizeof($errors)) {
        return redirect('ticket/create')->withErrors($errors)->withInput(request()->input());
       }

       
       $picture = picture::storeFile(request()->image);
      





       //create a new ticket object
        $ticket = new Ticket();
        $ticket->picture_id = $picture->id;
        //complete the field with the data
        $ticket->name = request()->name;
        $ticket->description = request()->description;
        $ticket->date = request()->date;
        $ticket->price = request()->price;
        $ticket->category_id = request()->category;
        $ticket->event_id = request()->event;
        $ticket->save();

        //go to ticket idea
        return redirect("/event");

    }

   
}
