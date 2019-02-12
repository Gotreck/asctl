<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\event;
use App\ticket;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("event.create");
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
      if(empty(request()->name)|| empty(request()->start_date) || empty(request()->description) || empty(request()->end_date)){
          array_push($errors,"Merci de compléter tout les champs ");
      }
       //print the error in event create page
       if (sizeof($errors)) {
        return redirect('event/create')->withErrors($errors)->withInput(request()->input());
       }
        //create a new event object
        $event = new Event();

        //add price and recurrency
        //complete the field with the data
        $event->name = request()->name;
        $event->user_id = session()->get('user')[0];
        $event->description = request()->description;
        $event->start_date = request()->start_date;
        $event->end_date = request()->end_date;
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
