<?php

namespace App\Http\Controllers;

use App\category;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        //
        return view('category.create');

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
        //set $connected to false
        $connected=false;
        //put error inside an array
        $errors = array();

        //check if the user is connected
        if(session()->has('user'))
        {
            //set $connected to true
            $connected = true;
            //get the user in the database
            $user = user::find(session()->get('user')[0]);
        }

        else
        {
            //return error
            array_push($errors,'Vous devez etre connecté pour accéder a cette fonctionalité');
        }



        //if $connected is true
        if($connected){
          //check if the user is admin
            if($user->hasRole('admin')){

                //check if the category exist
                if(category::where('name',request()->category)->count())
                {
                    //returns an error
                    array_push($errors,'Cette catégorie existe déja');
                }
            }
        }

        if(empty(request()->category)|| empty(request()->color)){
            array_push($errors,"Merci de compléter tout les champs ");
        }


        //if errors
        if(sizeof($errors)){
            return redirect()->back()->withErrors($errors)->withInput(request()->input());
        }

        //create a new category
        $cat = new category();
                //get the name
                $cat->name=request()->category;
                $cat->color=request()->color;
                //save the new category
                $cat->save();

        //go to product/create
        return redirect('/ticket/create');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
}
