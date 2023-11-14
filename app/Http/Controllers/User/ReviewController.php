<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function showReviews(){

        $authenticatedUser = Auth::user();

        $userReviews = $authenticatedUser->reviews()->orderBy('created_at', 'desc')->get();


        return view('user.reviews', compact('userReviews'));
    }
}
