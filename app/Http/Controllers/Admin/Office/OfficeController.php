<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\LandingBanner;
use App\Models\LandingReview;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $filledProfile = isset($user->first_name) &&
            isset($user->last_name) &&
            isset($user->about_me) &&
            isset($user->avatar) &&
            isset($user->whatsapp) &&
            isset($user->telegram);

        $filledHistory = History::query()
                ->where('user_id', $user->id)
                ->count() > 0;

        $filledReview = Review::query()
                ->where('user_id', $user->id)
                ->count() > 0;

        $filledSite = isset($user->landing_about_me) &&
            LandingReview::query()->where('user_id', $user->id)->count() > 0 &&
            LandingBanner::query()->where('user_id', $user->id)->count() > 0;

        $siteOccupancy = [
            true,
            $filledProfile,
            $filledHistory,
            $filledReview,
            $filledSite,
        ];

        return view('admin.office.index')
            ->with(compact('siteOccupancy'));
    }
}
