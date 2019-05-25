<?php

namespace App\Http\Controllers;

use App\order;
use App\user;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Mail;


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

    public function old()
    {
        //
        if(session()->has('user')) {
            $user = user::find(session()->get('user')[0]);
            $carts = $user->oldCart();
            
            return view ("cart.old", compact('carts'));
    
        }
        else{
            return redirect('/event');
        }
    }


    public function validateOrder($Orderid)
    {
        //
        $user = user::find(session()->get('user')[0]);
        $cart = $user->cart();        
        $cart->validateorder($Orderid);


        $data = array('last_name'=>$user->last_name, 'first_name'=>$user->first_name);

        // Mail::send('emails.mail', $data, function($message) {
        //     $user = user::find(session()->get('user')[0]);
        //     $id = $Orderid;
        //     $cart = $user->oneCart($id);
        //     $pdf = PDF::loadView('pdf.order', compact('cart'), compact('id','user'));
        //     $message->to($user->email)
        //             ->subject('Validation de commande');
        //     $message->attachData($pdf->output(), "Order n°$id .pdf");
        //     $message->from('obigame68@gmail.com', 'ASCTL');
        // });
        return redirect('/order');

    }


    public function orderPdf($id)
    {
        if(session()->has('user')) {
            $user = user::find(session()->get('user')[0]);
            $cart = $user->oneCart($id);
            $pdf = PDF::loadView('pdf.order', compact('cart'), compact('id','user'));
            $name = "commandeNo-".$id.".pdf";
            return $pdf->download($name);
                
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

        return redirect('/order');


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
