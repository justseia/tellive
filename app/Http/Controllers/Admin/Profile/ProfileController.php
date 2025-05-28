<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Enums\TypeTravelEnum;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Info;
use App\Models\Review;
use App\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        $typeTravelEnum = TypeTravelEnum::get();

        $user = app('user');
        $baseDomain = config('app.base_url');
        $siteUrl = $request->getScheme() . '://' . $user->subdomain . '.' . $baseDomain;

        $videos = Video::query()
            ->latest()
            ->where('user_id', $user->id)
            ->get();

        $histories = History::query()
            ->latest()
            ->where('user_id', $user->id)
            ->get();

        $reviews = Review::query()
            ->latest()
            ->where('user_id', $user->id)
            ->get();

        return view('admin.profile.index')
            ->with(compact('typeTravelEnum'))
            ->with(compact('videos'))
            ->with(compact('histories'))
            ->with(compact('reviews'))
            ->with(compact('user'))
            ->with(compact('siteUrl'));
    }

    public function edit(): View
    {
        $user = auth()->user();
        $infos = Info::all();

        return view('admin.profile.edit')
            ->with(compact('infos'))
            ->with(compact('user'));
    }
}
