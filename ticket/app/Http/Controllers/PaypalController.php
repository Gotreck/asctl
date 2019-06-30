<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GetOrder;

class PaypalController extends Controller
{
    //
    public $paypal;
    public $order;

    public function __construct()
    {
        $this->paypal = new GetOrder;
        $this->order = new OrderController;

    }

    public function Capture($data, $id)
    {
        $this->order->validateOrder($id);
//        $this->order->sendEmail($id);
    }
}
