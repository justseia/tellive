<?php

namespace App\Http\Controllers\Admin\Editor;

use App\Http\Controllers\Controller;
use App\Models\LandingBanner;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function edit(LandingBanner $banner): View
    {
        return view('admin.editor.banner.edit')
            ->with(compact('banner'));
    }

    public function update(LandingBanner $banner, Request $request): RedirectResponse
    {
        try {
            if ($request->has('type')) {
                $type = $request->input('type');

                if ($type == 'up') {
                    $swap = LandingBanner::query()->where('index', $banner->index + 1)->first();

                    if ($swap) {
                        $swap->decrement('index');
                        $banner->increment('index');
                    }
                } elseif ($type == 'down') {
                    $swap = LandingBanner::query()->where('index', $banner->index - 1)->first();
                    if ($swap) {
                        $swap->increment('index');
                        $banner->decrement('index');
                    }
                }

                return back()->with('success', 'Успешно');
            }

            $validated = $request->validate([
                'name_banner' => ['required', 'string', 'max:255'],
                'title' => ['required', 'string', 'max:255'],
                'text_banner' => ['required', 'string'],
                'image' => ['nullable', 'image'],
                'text_button' => ['required', 'string', 'max:255'],
                'url_button' => ['required', 'url', 'max:255'],
            ]);

            if ($request->hasFile('image')) {
                $imagePath = '/storage/' . $request->file('image')->store('banners', 'public');
            }

            $banner->update([
                'name_banner' => $validated['name_banner'],
                'title' => $validated['title'],
                'text_banner' => $validated['text_banner'],
                'image_url' => $imagePath ?? $banner->image_url,
                'text_button' => $validated['text_button'],
                'url_button' => $validated['url_button'],
                'user_id' => auth()->id(),
            ]);
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return back()->with('success', 'Успешно');
    }

    public function create(): View
    {
        return view('admin.editor.banner.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'name_banner' => ['required', 'string', 'max:255'],
                'title' => ['required', 'string', 'max:255'],
                'text_banner' => ['required', 'string'],
                'image' => ['required', 'image', 'max:255'],
                'text_button' => ['required', 'string', 'max:255'],
                'url_button' => ['required', 'url', 'max:255'],
            ]);

            $imagePath = '/storage/' . $request->file('image')->store('banners', 'public');

            $maxIndex = LandingBanner::max('index') ?? 0;
            LandingBanner::query()->create([
                'index' => $maxIndex + 1,
                'name_banner' => $validated['name_banner'],
                'title' => $validated['title'],
                'text_banner' => $validated['text_banner'],
                'image_url' => $imagePath,
                'text_button' => $validated['text_button'],
                'url_button' => $validated['url_button'],
                'user_id' => auth()->id(),
            ]);
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('admin.editor.index')
            ->with('success', 'Успешно');
    }

    public function delete(LandingBanner $banner): RedirectResponse
    {
        try {
            $userId = auth()->id();
            $landingBanners = LandingBanner::query()
                ->where('user_id', $userId)
                ->where('index', '>', $banner->index)
                ->get();

            foreach ($landingBanners as $landingBanner) {
                $landingBanner->decrement('index');
            }

            $banner->delete();
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }


        return back()->with('success', 'Успешно');
    }
}
