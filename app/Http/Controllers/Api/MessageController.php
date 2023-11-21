<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'email' => 'required|email',
            'description' => 'required',
            'user_id' => 'required',
        ]);

        $newMessage = new Message();
        $newMessage->name = $data["name"];
        $newMessage->surname = $data["surname"];
        $newMessage->email = $data["email"];
        $newMessage->description = $data["description"];

        $user = User::find($data["user_id"]);
        $user->messages()->save($newMessage);

        return response()->json([
            'message' => "Grazie {$data['name']}, il tuo messaggio è stato inviato correttamente."
        ], 201);
    }
}
