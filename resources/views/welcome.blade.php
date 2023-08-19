@extends('layouts.app')

@section('content')
    <div class="uk-section uk-section-small uk-section-secondary">
        <div class="uk-container">
            <h1 class="uk-heading-divider uk-h3">
                A collection of downloadable components for UIkit
            </h1>
            <div data-uk-filter="target: .p79-components; animation: fade; duration: 500">
                <div class="uk-grid uk-grid-small uk-grid-divider" data-uk-grid>
                    <div class="uk-width-auto">
                        <ul class="uk-subnav uk-subnav-pill" data-uk-margin>
                            <li class="uk-active" data-uk-filter-control><a href="#">All</a></li>
                        </ul>
                    </div>
                    <div class="uk-width-auto">
                        <ul class="uk-subnav uk-subnav-pill" data-uk-margin>
                            <li data-uk-filter-control="filter: [data-tags*='light']; group: data-color">
                                <a href="#">Light</a>
                            </li>
                            <li data-uk-filter-control="filter: [data-tags*='dark']; group: data-color">
                                <a href="#">Dark</a>
                            </li>
                        </ul>
                    </div>
                    {{--<div class="uk-width-auto">
                        <ul class="uk-subnav uk-subnav-pill" data-uk-margin>
                            <li data-uk-filter-control="filter: [data-tags*='users']; group: size">
                                <a href="#">Users</a>
                            </li>
                            <li data-uk-filter-control="filter: [data-tags*='ecommerce']; group: size">
                                <a href="#">Ecommerce</a>
                            </li>
                        </ul>
                    </div>--}}
                </div>

                <ul class="uk-grid p79-components"
                    data-uk-grid="masonry: true">
                    @foreach ($components as $component)
                        <li data-tags="{{$component->theme}} users" class="uk-width-1-4@l uk-width-1-2@m uk-width-1-1">
                            <div
                                class="uk-card uk-card-primary uk-card-small uk-border-rounded uk-box-shadow-medium uk-width-1-1">
                                @if($component->thumbnail)
                                    <div class="uk-card-media-top">
                                        <a href="/component/{{$component->id}}">
                                            <img src="{{ asset('storage/' . $component->thumbnail) }}"
                                                 class="uk-width-1-1"
                                                 alt="{{$component->name}}">
                                        </a>
                                    </div>
                                @endif
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title">
                                        <a href="/component/{{$component->id}}">
                                            {{$component->name}}
                                        </a>
                                    </h3>
                                    <div class="uk-flex uk-flex-between">
                                        <a href="/component/{{$component->id}}"
                                           class="uk-button uk-button-default uk-border-rounded">Info</a>
                                        <div data-uk-lightbox>
                                            <a href="/component/{{$component->id}}/preview"
                                               data-caption="{{$component->name}}"
                                               data-type="iframe"
                                               class="uk-button uk-button-primary uk-border-rounded">Preview</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
