<?php

namespace App\Http\Controllers;

use App\order;
use App\user;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(session()->has('user')) {
            $user = user::find(session()->get('user')[0]);
            $cart = $user->cart();
            $tickets = $cart->tickets;
            
            return view ("cart.show", compact('tickets'), compact('cart'));
    
        }
        else{
            return redirect('/event');
        }
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
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    public function addTicket(){

        $user = user::find(session()->get('user')[0]);

        $cart = $user->cart();
        
        
        $cart->addticket(request()->ticket_id,request()->quantity);

        return redirect('/event/1/tickets');


    }

    public function deleteTicket(){      

        $user = user::find(session()->get('user')[0]);

        $cart = $user->cart();
        $cart->deleteticket(request()->ticket_id);
        return redirect('/order');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
