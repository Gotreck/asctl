<?php

namespace App\Http\Controllers;

use App\training;
use App\event;
use App\user;
use App\guest;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            {
                $events = event::get();
                $guests = guest::get();
        
                return view("training.create", compact('events'),compact('guests'));

            }

        }
        return redirect("/");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = user::find(session()->get('user')[0]);

        //errors placed inside an array
        $errors = array();
        //error if the user is not connected
        if(!$user->hasRole('admin')){
            array_push($errors,"Vous devez être admin pour créer un training");
        }
  
        //error if one of fields belows is not completed
        if(empty(request()->begin_time) ||empty(request()->end_time)){
            array_push($errors,"Merci de compléter tout les champs");
  
        }

  
  
  
         //print the error in training create page
         if (sizeof($errors, 0)) {
          return redirect('training/create')->withErrors($errors)->withInput(request()->input());
         }
  
         
        
  
  
  
  
  
         //create a new training object
          $training = new Training();
          //complete the field with the data
          $training->begin_time = request()->begin_time;
          $training->end_time = request()->end_time;
          $training->guest_id = request()->guest;
          $training->event_id = request()->event;
          $training->save();
  
          //go to training idea
          return redirect("/");
  
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(training $training)
    {
        //
    }
}
