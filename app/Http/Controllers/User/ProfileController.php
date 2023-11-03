<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\Models\Specialization;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function store(ProfileStoreRequest $request)
    {
        // Procedo alla validazione dei dati ricevuti
        $data = $request->validated();

        // Salvo il file nel filesystem
        //Con il metodo put(), viene ritornato il path del file salvato con un codice univoco
        $curriculum_path = Storage::put("files", $data["curriculum"]);
        $image_path = Storage::put("images", $data["photo"]);

        // Sovrascrivo il record "curriculum" con il nuovo path generato che poi verrà salvato sul db
        $data['curriculum'] = $curriculum_path;
        $data['photo'] = $image_path;
        
        // dd($curriculum_path, $image_path ); OK 

        $user = Auth::user(); // Ottieni l'utente autenticato
        $profile = $user->profile()->create($data);

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
    public function update(ProfileUpdateRequest $request, string $id)
    {
        
        $data = $request->validated();
        //qui si recupera il PROFILO (nonostante la variabile si chiami user)
        $user = Profile::findOrFail($id);

        //recupero l'UTENTE (nonostante la variabile si chiami profile) 
        $profile = $user->user;

        $profile->specializations()->sync($request->input('specializations', []));

        // Se l'immagine viene modificata mi viene passata la chiave 'photo' altrimenti la chiave non viene passata e non viene settata
        if (isset($data['photo'])) {

            // Se voglio modificare l'immagine prima di inserire una nuova immagine cancello quella originale
            if ($user->photo) {
                Storage::delete($user->photo);
            }

            $image_path = Storage::put("images", $data["photo"]);
            $data['photo'] = $image_path;

            dd($image_path);

        }

        // Se il file viene modificato mi viene passata la chiave 'curriculum' altrimenti la chiave non viene passata e non viene settata
        if (isset($data['photo'])) {

            // Se voglio modificare il file prima di inserire un nuovo file cancello quello originale
            if ($user->curriculum) {
                Storage::delete($user->curriculum);
            }

            $curriculum_path = Storage::put("files", $data["curriculum"]);
            $data['curriculum'] = $curriculum_path;

            dd($curriculum_path);
        }
        
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
        return redirect()->route('user.create');
    }
}
