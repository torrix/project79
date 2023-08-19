@extends('layouts.app')

<?php
$overrides = '// Override UIkit variables' . PHP_EOL . $component->overrides;

$uikitScss = '// Import UIkit
@import "uikit/src/scss/variables-theme.scss";
@import "uikit/src/scss/mixins-theme.scss";
@import "uikit/src/scss/uikit-theme.scss";';

$scss      = '// Custom CSS' . PHP_EOL . $component->scss;
?>

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-light">
            <div class="uk-flex uk-flex-between">
                <div>
                    <a class="uk-button uk-button-default uk-border-rounded"
                       href="/">
                        Back
                    </a>
                </div>
                <div>
                    <h2>{{ $component->name }}</h2>
                </div>
            </div>
            <div class="uk-grid" data-uk-grid>
                <div class="uk-width-1-3@l">
                    @if($component->thumbnail)
                        <div class="uk-card-media-top">
                            <img src="{{ asset('storage/' . $component->thumbnail) }}"
                                 class="uk-width-1-1"
                                 alt="{{$component->name}}">
                        </div>
                    @endif
                </div>
                <div class="uk-width-2-3@l">
                    <h3>HTML</h3>
                    @if ($component->html)
                        <pre class="uk-padding-remove"><code
                                class="hljs
                                html uk-padding-small">{!! $highlighter->highlight('html', $component->html)->value !!}</code></pre>
                    @else
                        None
                    @endif
                    <h3>SCSS</h3>
                    @if ($component->overrides || $component->scss)
                        <pre class="uk-padding-remove"><code><span
                                    class="hljs
                                scss">{!! $highlighter->highlight('scss', $overrides)->value !!}</span><span
                                    class="hljs
                                scss">{!! $highlighter->highlight('scss', $uikitScss)->value !!}</span><span
                                    class="hljs
                                scss">{!! $highlighter->highlight('scss', $scss)->value !!}</span></code></pre>
                    @else
                        None
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
