@extends('layouts.app')

<?php
$overrides = '// Override UIkit variables' . PHP_EOL . $component->overrides;

$uikitScss = '// Import UIkit
@import "uikit/src/scss/variables-theme.scss";
@import "uikit/src/scss/mixins-theme.scss";
@import "uikit/src/scss/uikit-theme.scss";';

$scss = '// Custom CSS' . PHP_EOL . $component->scss;
?>

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-light">
            <div class="uk-grid uk-grid-small" data-uk-grid>
                <div class="uk-width-expand">
                    <a class="uk-button uk-button-default uk-border-rounded"
                       href="/">
                        <span data-uk-icon="icon: chevron-left"></span>
                        Back
                    </a>
                </div>
                <div class="uk-width-auto">
                    <a class="uk-button uk-button-default uk-border-rounded"
                       href="/">
                        <span data-uk-icon="icon: eye"></span>
                        Preview
                    </a>
                </div>
                <div class="uk-width-auto">
                    <a class="uk-button uk-button-primary uk-border-rounded"
                       href="/">
                        <span data-uk-icon="icon: download"></span>
                        Download
                    </a>
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
                    <h2>{{ $component->name }}</h2>

                    <ul data-uk-tab>
                        <li><a href="#">Description</a></li>
                        <li><a href="#">Code</a></li>
                        <li><a href="#">Details</a></li>
                    </ul>

                    <ul class="uk-switcher uk-margin">
                        <li>
                            <p>{{ $component->description }}</p>
                            @foreach($component->tags as $tag)
                                <span class="uk-label">{{ $tag->name }}</span>
                            @endforeach
                        </li>
                        <li>
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
                        </li>
                        <li>
                            <dl>
                                <dt>ID</dt>
                                <dd>{{ $component->id }}</dd>
                                <dt>Date added</dt>
                                <dd>
                                    {{ $component->created_at->format('jS F Y') }}
                                    ({{ $component->created_at->diffForHumans() }})
                                </dd>
                                @if ($component->updated_at)
                                    <dt>Date updated</dt>
                                    <dd>
                                        {{ $component->updated_at->format('jS F Y') }}
                                        ({{ $component->updated_at->diffForHumans() }})
                                    </dd>
                                @endif
                                @if ($component->user)
                                    <dt>Author</dt>
                                    <dd>{{ $component->user->name }}</dd>
                                @endif
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
