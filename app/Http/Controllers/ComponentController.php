<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class ComponentController extends Controller
{
    public function show(Component $component): View
    {
        return view('component', [
            'component' => $component,
        ]);
    }

    public function css(Component $component): Response
    {
        return response($component->css)->header('Content-Type', 'text/css');
    }
}
