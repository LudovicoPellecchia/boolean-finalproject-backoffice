<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
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
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = Auth::user(); // Ottieni l'utente autenticato
        $profile = $user->profile()->create($data);
        return redirect()->route('user.show', $profile->id);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $authenticatedUser = Auth::user();
        $profile = Profile::findOrFail($id);

        if ($authenticatedUser->id !== $profile->user_id) {
            // return redirect()->route('user.show', $authenticatedUser->profile->id);
            abort(404);
        }

        return view('user.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Profile::FindOrFail($id);
        return view('user.edit', compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $user = Profile::findOrFail($id);
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
