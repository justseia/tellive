<?php

namespace App\Http\Controllers\Admin\Office;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index(): View
    {
        return view('admin.office.index');
    }
}
