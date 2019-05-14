<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use App\Concert;
use Illuminate\Http\Request;

class ConcertOrdersController extends Controller
{

    private $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }


    public function store($concert_id)
    {
        $concert = Concert::find($concert_id);
        $ticketQuantity = \request('ticket_quantity');
        $token = \request('payment_token');
        $amount = $ticketQuantity * $concert->ticket_price;
        $this->paymentGateway->charge($amount, $token);

        $order = $concert->orders()->create(['email' => \request('email')]);

        foreach(range(1, $ticketQuantity) as $i){
            $order->tickets()->create([]);
        }

        return response()->json([], 201);
    }
}
