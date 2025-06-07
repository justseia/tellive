<?php

namespace App\Http\Controllers\Admin\Video;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(): View
    {
        $user = app('user');

        $videos = Video::query()
            ->latest()
            ->where('user_id', $user->id)
            ->get();

        return view('admin.video.index')
            ->with(compact('videos'));
    }

    public function create(): View
    {
        return view('admin.video.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $imagePath = '/storage/' . $request->file('image')->store('tellive', 'public');

            Video::query()->create([
                'title' => $request->title,
                'image_url' => $imagePath,
                'youtube_url' => $request->youtube_url,
                'user_id' => auth()->id(),
            ]);
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('admin.video.index')
            ->with('success', 'Успешно');
    }
}
