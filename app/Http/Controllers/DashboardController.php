<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('welcome', [
            'components' => Component::all(),
        ]);
    }
}
