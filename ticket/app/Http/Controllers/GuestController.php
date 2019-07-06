<?php

namespace App\Http\Controllers;

use App\guest;
use App\user;
use App\picture;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guests = guest::get();
        return view("guest.index", compact('guests'));
    }

    public function show($id)
    {
        //
        $guest = guest::where('id',$id)->first();
        return view("guest.show", compact('guest'));
    }

    public function display_more($id)
    {
        //
        $guest = guest::where('id', request(id))->first();
        return view("guest.show", compact('guest'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if (session()->has('user'))
        {
            if(user::find(session()->get('user')[0])->hasRole('admin'))
            {
                return view("guest.create");
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
    public function store()
    {

      $user = user::find(session()->get('user')[0]);

      //errors placed inside an array
      $errors = array();
      //error if the user is not connected
      if(!$user->hasRole('admin')){
          array_push($errors,"Vous devez être admin pour créer un guest");
      }

      //error if one of fields belows is not completed
      if(empty(request()->last_name)|| empty(request()->first_name) || empty(request()->description)){
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




       //print the error in guest create page
       if (sizeof($errors, 0)) {
        return redirect('guest/create')->withErrors($errors)->withInput(request()->input());
       }

       
       $picture = picture::storeFile(request()->image);
      





       //create a new guest object
        $guest = new Guest();
        $guest->picture_id = $picture->id;
        //complete the field with the data
        $guest->last_name = request()->last_name;
        $guest->first_name = request()->first_name;
        $guest->description = request()->description;
        $guest->description_fr = request()->description_fr;
        $guest->description_en = request()->description_en;
        $guest->website = request()->website;
        $guest->social = request()->social;
        $guest->youtube = request()->youtube;
        $guest->movie = request()->movie;

        $guest->save();

        //go to guest idea
        return redirect("/");

    }

   


    /**
     * Display the specified resource.
     *
     * @param  \App\guest  $guest
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(guest $guest)
    {
        //
    }
}
