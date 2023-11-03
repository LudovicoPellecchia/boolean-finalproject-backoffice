<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Specialization;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Ottieni l'utente autenticato

        if ($user->profile) {
            // Se l'utente ha già creato un profilo, lo reindirizziamo allo "user.show"
            return redirect()->route('user.show', $user->profile->id);
        } else {
            // L'utente non ha creato un profilo, quindi mostriamo la vista "user.index" per crearne uno
            return view('user.create', compact('user'));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = Specialization::all();
        

        return view('user.create', compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = Auth::user(); // Ottieni l'utente autenticato
        $profile = $user->profile()->create($data);

        if (key_exists('specializations', $data)){
            $user->specializations()->attach($request["specializations"]);
        };

        return redirect()->route('user.show', $profile->id);



    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Verifico se l'utente è autenticato
        $authenticatedUser = Auth::user();
        $profile = Profile::findOrFail($id);

        // Se l'id dell'utente loggato è diverso dalla fk del profilo dell'utente allora l'utente viene reindirizzato alla pagina 404 Not Found
        if ($authenticatedUser->id !== $profile->user_id) {
            abort(404);
        }


        //recupero le specializzazioni dell'utente autenticato
        $userSpecializations = $authenticatedUser->specializations;

        return view('user.show', compact('profile', 'userSpecializations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $authenticatedUser = Auth::user();
        $profile = Profile::findOrFail($id);
        $specializations = Specialization::all();


        // Se l'id dell'utente loggato è diverso dalla fk del profilo dell'utente allora l'utente viene reindirizzato alla pagina 404 Not Found
        if ($authenticatedUser->id !== $profile->user_id) {
            abort(404);
        }

        //recupero le specializzazioni dell'utente autenticato
        $userSpecializations = $authenticatedUser->specializations;

        return view('user.edit', compact('profile', 'userSpecializations', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        //qui si recupera il PROFILO (nonostante la variabile si chiami user)
        $user = Profile::findOrFail($id);

        //recupero l'UTENTE (nonostante la variabile si chiami profile) 
        $profile = $user->user;

        $profile->specializations()->sync($request->input('specializations', []));

        $user->update($data);
        return redirect()->route('user.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Profile::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
