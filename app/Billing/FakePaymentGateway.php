<?php


namespace App\Billing;


class FakePaymentGateway implements PaymentGateway
{

    public $charges;

    /**
     * FakePaymentGateway constructor.
     *
     * @param $charges
     */
    public function __construct()
    {
        $this->charges = collect();
    }


    public function getValidTestToken()
    {
        return "valid-token";
    }

    public function totalCharges()
    {
        return $this->charges->sum();
    }

    public function charge($amount, $token)
    {
        $this->charges[] = $amount;
    }

}