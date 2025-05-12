<?php

namespace App\Http\Controllers\Admin\History;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class HistoryController extends Controller
{
    public function index(): View
    {
        return view('admin.history.index');
    }

    public function show(): View
    {
        return view('admin.history.show');
    }

    public function create(): View
    {
        return view('admin.history.create');
    }
}
