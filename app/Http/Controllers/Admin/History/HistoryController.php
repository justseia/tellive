<?php

namespace App\Http\Controllers\Admin\History;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(): View
    {
        return view('admin.history.index');
    }
}
