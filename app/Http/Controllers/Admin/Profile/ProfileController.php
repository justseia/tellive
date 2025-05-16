<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        $user = app('user');
        $baseDomain = config('app.base_url');
        $siteUrl = $request->getScheme() . '://' . $user->subdomain . '.' . $baseDomain;

        $videos = Video::query()
            ->where('user_id', $user->id)
            ->get();

        return view('admin.profile.index')
            ->with(compact('videos'))
            ->with(compact('user'))
            ->with(compact('siteUrl'));
    }
}
