<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();
        $profile = Profile::where('user_id', $userId)->first();

        return view('landing.index')
            ->with(compact('profile'));
    }
}
