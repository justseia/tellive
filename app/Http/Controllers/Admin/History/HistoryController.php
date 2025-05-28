<?php

namespace App\Http\Controllers\Admin\History;

use App\Enums\TypeTravelEnum;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\HistoryBlock;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();
        $histories = History::query()
            ->where('user_id', $userId)
            ->get();

        return view('admin.history.index')
            ->with(compact('histories'));
    }

    public function search(): View
    {
        $typeTravelEnum = TypeTravelEnum::get();

        $histories = History::query()->where('type', 'public')->get();

        return view('admin.history.search')
            ->with(compact('typeTravelEnum'))
            ->with(compact('histories'));
    }

    public function show(History $history): View
    {
        return view('admin.history.show')
            ->with(compact('history'));
    }

    public function create(): View
    {
        return view('admin.history.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $userId = auth()->id();

        $historyId = History::query()->create([
            'type' => $request->type,
            'views' => 0,
            'title' => $request->title,
            'date' => $request->date,
            'image_url' => $request->image_url,
            'type_of_history' => $request->type_of_history,
            'user_id' => $userId,
        ])->id;

        foreach ($request->blocks as $block) {
            HistoryBlock::query()->create([
                'text' => $block->title,
                'images_url' => $block->images_url,
                'youtube_url' => $block->youtube_url,
                'history_id' => $historyId,
            ]);
        }

        return redirect()->route('admin.history.index');
    }
}
