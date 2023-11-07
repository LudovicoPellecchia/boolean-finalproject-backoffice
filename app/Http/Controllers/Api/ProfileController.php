<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // public function index(){
    //     $users = User::with('specializations')->paginate();

    //     return response()->json($users);
    // }

    public function index()
    {
        $users = User::with('profile', 'specializations')->get();
        return response()->json(['data' => $users]);
    }

    public function show($id)
    {
        $profiles = Profile::where('user_id', $id)->with('user')->paginate();
        $users = User::where('id', $id)->with('specializations')->paginate();

        // Creare un array associativo con i dati che desideri restituire
        $data = [
            'profiles' => $profiles,
            'users' => $users,
        ];

        return response()->json($data);
    }


    public function specializationUserFilter($specializationName = null)
{
    $usersQuery = User::with('profile', 'specializations'); // Inizia con una query che carica tutti gli utenti con i loro profili

    if ($specializationName) {
        // Cerca la specializzazione corrispondente nel modello Specialization
        $specialization = Specialization::where('name', $specializationName)->first();

        if ($specialization) {
            // Se la specializzazione esiste, ottieni gli utenti associati a questa specializzazione
            $usersQuery->whereHas('specializations', function ($query) use ($specialization) {
                $query->where('specialization_id', $specialization->id);
            });
        }
    }

    // Ottieni gli utenti in base alla query
    $users = $usersQuery->get();

    return response()->json(['data' => $users]);
}

}


