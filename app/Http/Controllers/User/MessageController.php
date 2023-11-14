<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller {
    public function printMessages ()  {

        // Ottengo l'utente autenticato
        $authenticatedUser = Auth::user(); 
        
        // Recupero i messaggi associati all'utente autenticato, ordinati per created_at
        $userMessages = $authenticatedUser->messages()->orderBy('created_at', 'desc')->get(); 

        // Restituisco la view 'messages.blade.php', passando i messaggi come variabile
        return view('user.messages', compact('userMessages'));

    }
}
