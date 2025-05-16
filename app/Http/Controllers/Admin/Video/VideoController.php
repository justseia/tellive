<?php

namespace App\Http\Controllers\Admin\Video;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(): View
    {
        $videos = Video::query()
            ->latest('created_at')
            ->where('user_id', app('user')->id)
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
        Video::query()->create([
            'title' => $request->title,
            'image_url' => $request->image_url,
            'youtube_url' => $request->youtube_url,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.video.index');
    }
}
