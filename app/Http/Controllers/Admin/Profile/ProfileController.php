<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Enums\TypeTravelEnum;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Info;
use App\Models\Review;
use App\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'last_name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'about_me' => ['sometimes', 'nullable', 'string', 'max:1000'],
            'avatar' => ['sometimes', 'nullable', 'image', 'max:2048'],
            'whatsapp' => ['sometimes', 'nullable', 'string', 'max:255'],
            'telegram' => ['sometimes', 'nullable', 'string', 'max:255'],
            'first_info_id' => ['sometimes', 'nullable', 'uuid'],
            'first_info_type' => ['sometimes', 'nullable', 'string', 'max:255'],
            'second_info_id' => ['sometimes', 'nullable', 'uuid'],
            'second_info_type' => ['sometimes', 'nullable', 'string', 'max:255'],
            'third_info_id' => ['sometimes', 'nullable', 'uuid'],
            'third_info_type' => ['sometimes', 'nullable', 'string', 'max:255'],
        ]);

        if ($request->hasFile('image')) {
            $imagePath = '/' . $request->file('image')->store('banners', 'public');
            $validated['avatar'] = $imagePath;
        }

        auth()->user()->update($validated);

        return back()->with('success', 'Успешно');
    }
}
