<?php


namespace Tests\unit\Billing;


use App\Billing\FakePaymentGateway;
use App\Billing\PaymentFailedException;
use Tests\TestCase;

class FakePaymentGatewayTest extends TestCase
{

    /**
     * @test
     */
    public function charges_with_a_valid_payment_token_are_successful()
    {
        $paymentGateway = new FakePaymentGateway();
        $paymentGateway->charge(2500, $paymentGateway->getValidTestToken());
        $this->assertEquals(2500, $paymentGateway->totalCharges());
    }

    /**
     * @test
     * @doesNotPerformAssertions
     */
    function charges_with_an_invalid_payment_token_fail()
    {
        try {
            $paymentGateway = new FakePaymentGateway;
            $paymentGateway->charge(2500, 'invalid-payment-token');
        } catch (PaymentFailedException $e) {
            return;
        }

        $this->fail();
    }

}