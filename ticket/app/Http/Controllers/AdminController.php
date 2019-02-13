<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\ticket;
use App\order;

class AdminController extends Controller
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
            if(user::find(session()->get('user')[0])->hasRole('admin'))
            {
                $orders = order::get();
                return view("admin.main", compact('orders'));

            }

        }
        return redirect("/event");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($ticket)
    {
        // 
        $user = user::find(session()->get('user')[0]);
        $cart = $user->cart();       
        $cart->validateticket($ticket);

        return redirect('/admin');
    }

    public function back($ticket)
    {
        // 
        $user = user::find(session()->get('user')[0]);
        $cart = $user->cart();       
        $cart->rollbackticket($ticket);

        return redirect('/admin');
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
