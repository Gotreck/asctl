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
        $response = $this->paypal->getOrder($data);
        // print_r($response);
        $this->order->validateOrder($id);
    }
}
