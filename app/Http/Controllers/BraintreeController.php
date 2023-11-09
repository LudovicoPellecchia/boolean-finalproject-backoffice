<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Braintree\Gateway;
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    public function token(Request $request)
    {
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        if ($request->input('nonce') != null) {
            $nonceFromTheClient = $request->input('nonce');
            $sponsorPlan = $request->input('sponsor_plan');

            $planPrices = [
                '24' => 2.99,
                '72' => 5.99,
                '144' => 9.99
            ];

            $amount = $planPrices[$sponsorPlan];

            $result = $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);

            if ($result->success) {
                // Salva i dettagli dello sponsor nel database
                $sponsor = new Sponsor();
                $sponsor->name = $request->input('sponsor_name');
                $sponsor->price = $amount;
                $sponsor->premium = false; // Valore iniziale
                $sponsor->save();

                return view('user.index');
            } else {
                // Gestisci il caso in cui il pagamento non vada a buon fine
                return redirect()->back()->with('error', 'Errore durante il pagamento.');
            }
        } else {
            $clientToken = $gateway->clientToken()->generate();
            return view('braintree', ['token' => $clientToken]);
        }
    }
}
