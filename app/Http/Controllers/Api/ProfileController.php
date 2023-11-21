<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function filterUsersBySpecialization($id = null)
    {
        if (!$id) {
            return response()->json(['error' => 'Parametro id mancante.'], 400);
        }

        $specialization = Specialization::where('id', $id)->first();

        if (!$specialization) {
            return response()->json(['error' => 'Parametro specialization non valido.'], 400);
        }

        $users = User::with('profile', 'specializations')
            ->whereHas('specializations', function ($query) use ($specialization) {
                $query->where('specialization_id', $specialization->id);
            })
            ->select('users.*')
            ->addSelect(DB::raw('COALESCE(ROUND(CAST((SELECT AVG(score) FROM reviews WHERE user_id = users.id) AS UNSIGNED)), 0) as average_score'))
            ->addSelect(DB::raw('(SELECT COUNT(*) FROM reviews WHERE user_id = users.id) as review_count'));
        return response()->json(['data' => $users->get()]);
    }
}
