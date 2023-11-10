<?php

namespace App\Http\Controllers;

use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use Carbon\Carbon;

class BraintreeController extends Controller
{
    public function showForm()
    {
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $clientToken = $gateway->clientToken()->generate();

        // Recupera le sponsorizzazioni attive dell'utente corrente con 'premium' a true
        $activeSponsorships = Sponsor::whereHas('users', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->where('premium', true)->get();

        // Calcola la data di scadenza basata sul valore numerico presente nella colonna 'name'
        foreach ($activeSponsorships as $sponsorship) {
            $hours = (int) $sponsorship->name; // Converti il valore da stringa a intero
            $sponsorship->end_date = Carbon::now()->addHours($hours);
        }

        return view('braintree', ['token' => $clientToken, 'activeSponsorships' => $activeSponsorships]);
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'sponsor' => 'required|in:2.99,5.99,9.99',
        ]);

        $price = $validatedData['sponsor'];
        $name = $this->mapValueToName($price);

        // Inizializza il gateway di Braintree
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        // Crea un token di pagamento
        $paymentMethodNonce = $request->input('payment-method-nonce');

        // Effettua il pagamento utilizzando il token di pagamento e il prezzo
        $result = $gateway->transaction()->sale([
            'amount' => $price,
            'paymentMethodNonce' => $paymentMethodNonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {
            // Il pagamento è riuscito
            $isPaymentSuccessful = true;
        } else {
            // Il pagamento è fallito
            $isPaymentSuccessful = false;
        }

        if ($isPaymentSuccessful) {
            // Crea un nuovo record sponsor solo se il pagamento è riuscito
            $sponsor = Sponsor::create([
                'name' => $name,
                'price' => $price,
                'premium' => true, // Imposta sempre a true se il pagamento è riuscito
            ]);

            // Ottieni l'ID dell'utente attualmente autenticato
            $userId = auth()->user()->id;

            // Collega l'utente alla sponsorizzazione nella tabella ponte "sponsor_user"
            $sponsor->users()->attach($userId);
        }

        $message = $isPaymentSuccessful ? 'Pagamento avvenuto con successo!' : 'Pagamento fallito';

        return redirect()->back()->with('message', $message);
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
