<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PremiumUserController extends Controller
{
    public function getPremiumUsers()
    {
        $premiumUsers = User::whereHas('sponsors', function ($query) {
            $query->where('premium', true)
                ->where('end_date', '>', Carbon::now());
        })->with('profile', 'specializations')->get();

        return response()->json($premiumUsers);
    }
}
