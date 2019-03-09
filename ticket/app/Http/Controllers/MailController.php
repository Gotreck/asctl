<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use PDF;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendEmail(){
        $data = array('name'=>"Joshua", "body" => "This is my first Online Email.");

        Mail::send('emails.mail', $data, function($message) {
        $user = user::find(session()->get('user')[0]);
        $cart = $user->oneCart(1);
        $id =1;
        $pdf = PDF::loadView('pdf.order', compact('cart'), compact('id','user'));
        $message->to($user->email)
                ->subject('Order');
        $message->attachData($pdf->output(), "Order n°.pdf");
        $message->from('obigame68@gmail.com','ASCTL');
});
    }
}
