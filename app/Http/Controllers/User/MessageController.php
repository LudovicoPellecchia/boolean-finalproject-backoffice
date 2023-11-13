<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller {
    public function printMessages ()  {

        // Ottengo l'utente autenticato
        $authenticatedUser = Auth::user(); 
        
        // Recupero i messaggi associati all'utente autenticato, utilizzando la relazione definita nel model dell'utente
        $userMessages = $authenticatedUser->messages; 

        // Restituisco la view 'messages.blade.php', passando i messaggi come variabile
        return view('user.messages', compact('userMessages'));

    }
}
