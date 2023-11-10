<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Braintree\Gateway;
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    /*     public function token(Request $request)
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
    } */


    // app/Http/Controllers/SponsorController.php


    public function showForm()
    {
        
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $clientToken = $gateway->clientToken()->generate();
        return view ('braintree',['token' => $clientToken]);
    }    


    

    public function submitForm(Request $request)
    {


        $validatedData = $request->validate([
            'sponsor' => 'required|in:2.99,5.99,9.99',
        ]);

        $price = $validatedData['sponsor'];
        $name = $this->mapValueToName($price);

        $sponsor = Sponsor::create([
            'name' => $name,
            'price' => $price,
            'premium' => true,
        ]);

        // Ottieni l'ID dell'utente attualmente autenticato
        $userId = auth()->user()->id;

        // Collega l'utente alla sponsorizzazione nella tabella ponte sponsor_user
        $sponsor->users()->attach($userId);

        return redirect()->back()->with('success', 'Pagamento avvenuto con successo!');
    }



    private function mapValueToName($value)
    {
        switch ($value) {
            case '2.99':
                return '24 ore';
            case '5.99':
                return '72 ore';
            case '9.99':
                return '144 ore';
            default:
                return 'Sconosciuto';
        }
    }
}
