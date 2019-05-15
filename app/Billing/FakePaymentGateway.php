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
        if ($token !== $this->getValidTestToken()) {
            throw new PaymentFailedException;
        }

        $this->charges[] = $amount;
    }

}