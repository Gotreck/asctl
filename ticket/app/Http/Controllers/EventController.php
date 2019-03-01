<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\event;
use App\ticket;
use App\guest;
use App\training;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events= event::get();
        return view("event.show",compact('events'));
    }


    public function welcome(){
        $guests = guest::get();
        $events = event::get();
        $display = event::first();
        $id = event::first()->id;


        return view("welcome", compact('guests', 'events', 'display', 'id'));
    }


    public function welcome_display(){
        $guests = guest::get();
        $events = event::get();
        $display= event::where('id',request()->id)->first();
        $id = request()->id;

        return view("welcome", compact('guests', 'events', 'display', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->has('user'))
        {
            if(user::find(session()->get('user')[0])->hasRole('admin'))
                return view("event.create");

        }

        return redirect("/event");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

      $user = user::find(session()->get('user')[0]);

      //errors placed inside an array
      $errors = array();
      //cath the picture file given by the user

      if(!$user->hasRole('admin')){
          array_push($errors,"Vous devez être admin pour créer un évènement");
      }
      //error if one of fields belows is not completed
      if(empty(request()->name)|| empty(request()->description) || empty(request()->date)){
          array_push($errors,"Merci de compléter tout les champs ");
      }
       //print the error in event create page
       if (sizeof($errors, 0)) {
        return redirect('event/create')->withErrors($errors)->withInput(request()->input());
       }
        //create a new event object
        $event = new Event();

        //add price and recurrency
        //complete the field with the data
        $event->name = request()->name;
        $event->user_id = session()->get('user')[0];
        $event->description = request()->description;
        $event->date = request()->date;

        //save all
        $event->save();

        //go to event idea
        return redirect("/event");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function buy(event $event){
        $tickets = $event->tickets();
        return view ("event.addCart", compact('tickets'));
    }
}
