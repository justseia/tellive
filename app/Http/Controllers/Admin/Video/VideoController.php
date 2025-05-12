<?php

namespace App\Http\Controllers\Admin\Video;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(): View
    {
        return view('admin.video.index');
    }
}
