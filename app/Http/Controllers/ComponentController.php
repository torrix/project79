<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use ScssPhp\ScssPhp\Compiler;

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
        if ($component->css) {
            return response($component->css)->header('Content-Type', 'text/css');
        }

        $compiler = new Compiler();

        $implode = implode(PHP_EOL, [
            $component->overrides,
            '@import "variables-theme.scss";',
            '@import "mixins-theme.scss";',
            '@import "uikit-theme.scss";',
            $component->scss,
        ]);

        try {
            $compiler->setImportPaths('../node_modules/uikit/src/scss/');
            $css = $compiler->compile($implode);
        } catch (Exception $e) {
            $css = '/* ' . $e->getMessage() . '*/';
        }

        $component->css = $css;
        $component->save();

        return response($css)->header('Content-Type', 'text/css');
    }
}
