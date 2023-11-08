<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    public function createReview(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'text' => 'required|string',
            'score' => 'required|integer|min:1|max:5',
        ]);

        // Cerca l'utente
        $user = User::find($data['user_id']);

        // Se l'utente non esiste, restituisci un errore
        if (!$user) {
            return response()->json(['error' => 'Utente non trovato'], 404);
        }


        // Creazione della recensione
        $review = Review::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'text' => $data['text'],
            'user_id' => $data['user_id'],
            'score' => $data['score'] ?? null,
        ]);

        // Associazione della recensione all'utente
        $user->reviews()->save($review);


        return response()->json($review, 201);
    }
}
