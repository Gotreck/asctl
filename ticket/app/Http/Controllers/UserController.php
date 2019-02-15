<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (session()->has('user'))
        {
            return redirect("/event");
        }
        return view("user.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (session()->has('user'))
        {
            return redirect("/event");
        }
        return view("user.register");
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
        //place errors inside an array
        $errors = array();

        //check if all field are completed
        if (!request()->country || !request()->club || !request()->first_name || !request()->last_name || !request()->email || !request()->password) {
            array_push($errors, "Merci de compléter tout les champs");
        }

        //check if the emails match each other
        if (request()->email != request()->email_confirm) {
            array_push($errors, "Les Email ne correspondent pas");
        }

        //check if the user has accepted
        if (empty(request()->accept)) {
            array_push($errors, "Merci d'accepter les conditions général d'utilisations");
        }

        //check the emails format
        if (!filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Le format de mail n'est pas valide");
        }


        //check if the passwords match each other
        if (request()->password != request()->password_confirm) {
            array_push($errors, "Les Mot de passe ne corespondent pas");
        }



        //check the password reliability
        if (strlen(request()->password) < 4) {
            array_push($errors, "Le mot de passe doit d'être de 4 caracteres minimims");
        }
        //check the password reliability
        // if (!preg_match("/^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/",request()->password)) {
        //     array_push($errors, "Le mot de passe doit contenir au moins une majuscule , minuscule, un chiffre et un caractere spécial");
        // }
        

        //if no error
        if (sizeof($errors) == 0) {
            $user = new User;
            $user->first_name = request()->first_name;
            $user->last_name = request()->last_name;
            $user->country = request()->country;
            $user->club = request()->club;
            $user->email = request()->email;
            $user->password = bcrypt(request()->password);
            $user->save();
            $user->addrole("User");
            return redirect('/login');


        }

        else{
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }

    public function processlogin()
    {
        //put errors inside an array
        $errors = array();
        $user = DB::table('users')->where('email', request()->email)->first();

        //if the user does not exist
        if (empty($user))
        {
            array_push($errors, "L'utilisateur n'existe pas");
            return redirect()->back()->withErrors($errors);
        }

        if (!Hash::check(request()->password, $user->password))
        {
            array_push($errors, "Les identifiants ne correspondent pas");
            return redirect()->back()->withErrors($errors);


        }

        if (Hash::check(request()->password, $user->password))
        {
            session()->push('user', $user->id);
        }
        return redirect('/event');

       

    }

    public function logout()
    {
        //close session
        Session::flush();
        //go to login page
        return redirect('/login');
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
}
