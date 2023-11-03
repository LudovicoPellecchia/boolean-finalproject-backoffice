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
        $profiles = Profile::where('id', $id)->with('user')->paginate();
        return response()->json($profiles);
    }

}
