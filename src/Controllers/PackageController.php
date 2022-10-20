<?php

namespace Tox\Controllers;

use Money\Money;
use Stripe\Charge;
use Stripe\Stripe;
use Money\Currency;
use Stripe\StripeClient;

class PackageController extends Controller
{
    public function getPackages()
    {
        return view('tox.packages.list')->with([
            'injectSetup' => true,
        ]);
    }

    public function paymentForm()
    {
        return view('tox.payments.form');
    }

    public function makePayment()
    {
        Stripe::setApiKey("sk_test_51CD8IZKnutIZb3TV9S9qwDqDwSik5pSfvPVWYWoPb8omTMXlAueO2kx9Y5uDGKYaJ877WqMGibovu7CELV13WLy1006TK1mXpr");
        // $stripe = new StripeClient("sk_test_51CD8IZKnutIZb3TV9S9qwDqDwSik5pSfvPVWYWoPb8omTMXlAueO2kx9Y5uDGKYaJ877WqMGibovu7CELV13WLy1006TK1mXpr");

        // $ch = $stripe->charges->capture(
        //     'ch_3LuYa6KnutIZb3TV1aAcOOMU',
        //     [],
        //     ['api_key' => 'sk_test_51CD8IZKnutIZb3TV9S9qwDqDwSik5pSfvPVWYWoPb8omTMXlAueO2kx9Y5uDGKYaJ877WqMGibovu7CELV13WLy1006TK1mXpr']
        // );

        // echo(Money::USD("10")->getAmount());
        // die();
        $charge = Charge::create([
            'amount' => Money::USD("10")->getAmount(),
            "description" => "Test Payment",
            "currency" => new Currency('USD'),
            "source" => "pk_test_hu9VjUaHmYP88TNXVZ2Rylpw",
        ]);

        echo '<pre>';
        print_r($charge);
    }
}
