<?php

namespace App\Http\Controllers\Admin\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index(): View
    {
        return view('admin.editor.index');
    }
}
