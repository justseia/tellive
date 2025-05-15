<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        $user = app('user');
        $baseDomain = config('app.base_url');
        $siteUrl = $request->getScheme() . '://' . $user->subdomain . '.' . $baseDomain;

        return view('admin.profile.index')
            ->with(compact('user'))
            ->with(compact('siteUrl'));
    }
}
