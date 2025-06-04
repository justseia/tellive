<?php

namespace App\Http\Controllers\Admin\Editor;

use App\Http\Controllers\Controller;
use App\Models\LandingBanner;
use App\Models\LandingReview;
use App\Models\Review;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $reviews = LandingReview::query()
            ->latest('index')
            ->where('user_id', $user->id)
            ->get();

        $banners = LandingBanner::query()
            ->latest('index')
            ->where('user_id', $user->id)
            ->get();

        return view('admin.editor.index')
            ->with(compact('user'))
            ->with(compact('banners'))
            ->with(compact('reviews'));
    }

    public function update(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'landing_about_me' => ['nullable', 'string', 'max:255'],
            ]);
            Auth::user()->update($validated);
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return back()->with('success', 'Успешно');
    }
}
