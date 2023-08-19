<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Highlight\Highlighter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class ComponentController extends Controller
{
    public function show(Component $component): View
    {
        $highlighter = new Highlighter();

        return view('component.show', [
            'component'   => $component,
            'highlighter' => $highlighter,
        ]);
    }

    public function preview(Component $component): View
    {
        return view('component.preview', [
            'component' => $component,
        ]);
    }

    public function css(Component $component): Response
    {
        return response($component->css)->header('Content-Type', 'text/css');
    }
}
