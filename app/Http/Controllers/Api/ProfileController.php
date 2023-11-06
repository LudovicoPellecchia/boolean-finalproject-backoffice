<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $users = User::with('specializations')->paginate();

        return response()->json($users);
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


}
