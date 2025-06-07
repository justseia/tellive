<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Enums\TypeTravelEnum;
use App\Enums\UserInfoEnum;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Info;
use App\Models\Review;
use App\Models\UserInfo;
use App\Models\Video;
use Exception;
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

        $userInfos = UserInfo::query()
            ->where('user_id', $user->id)
            ->get();

        return view('admin.profile.edit')
            ->with(compact('userInfos'))
            ->with(compact('infos'))
            ->with(compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'first_name' => ['sometimes', 'nullable', 'string', 'max:255'],
                'last_name' => ['sometimes', 'nullable', 'string', 'max:255'],
                'about_me' => ['sometimes', 'nullable', 'string', 'max:1000'],
                'avatar' => ['sometimes', 'nullable', 'image', 'max:2048'],
                'whatsapp' => ['sometimes', 'nullable', 'string', 'max:255'],
                'telegram' => ['sometimes', 'nullable', 'string', 'max:255'],
                'user_info' => ['sometimes', 'nullable', 'array', 'size:3'],
                'id' => ['sometimes', 'nullable', 'array', 'size:3'],
                'model' => ['sometimes', 'nullable', 'array', 'size:3'],
            ]);

            if (!$request->hasFile('avatar')) {
                unset($validated['avatar']);
            } else {
                $imagePath = '/storage/' . $request->file('avatar')->store('tellive', 'public');
                $validated['avatar'] = $imagePath;
            }

            if (isset($validated['user_info'])) {
                Auth::user()->update([
                    'first_info_type' => $validated['model'][0],
                    'first_info_id' => $validated['id'][0],
                    'second_info_type' => $validated['model'][1],
                    'second_info_id' => $validated['id'][1],
                    'third_info_type' => $validated['model'][2],
                    'third_info_id' => $validated['id'][2],
                ]);

                return back()->with('success', 'Успешно');
            }

            Auth::user()->update($validated);
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return back()->with('success', 'Успешно');
    }

    public function info(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'type' => ['sometimes', 'nullable', 'string', 'max:255'],
                'value' => ['sometimes', 'nullable', 'string', 'max:255'],
            ]);

            UserInfo::query()->updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'type' => $validated['type'],
                ],
                [
                    'value' => $validated['value'],
                ]
            );
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return back()->with('success', 'Успешно');
    }
}
