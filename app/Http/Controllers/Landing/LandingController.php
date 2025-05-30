<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\LandingBanner;
use App\Models\LandingReview;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(): View
    {
        $userId = app('user')->id;

        $banners = LandingBanner::query()
            ->where('user_id', $userId)
            ->get();
        $reviews = LandingReview::query()
            ->where('user_id', $userId)
            ->get();

        return view('landing.index')
            ->with(compact('banners'))
            ->with(compact('reviews'));
    }
}
