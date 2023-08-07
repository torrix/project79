@extends('layouts.app')

@section('content')
    <div class="uk-section uk-section-small uk-section-secondary">
        <div class="uk-container">
            <h1 class="uk-heading-divider">
                A collection of downloadable components for UIkit
            </h1>
            <div data-uk-filter="target: .p79-components; animation: fade; duration: 500">
                <div class="uk-grid-small uk-grid-divider uk-child-width-auto" data-uk-grid>
                    <div>
                        <ul class="uk-subnav uk-subnav-pill" data-uk-margin>
                            <li class="uk-active" data-uk-filter-control><a href="#">All</a></li>
                        </ul>
                    </div>
                    <div>
                        <ul class="uk-subnav uk-subnav-pill" data-uk-margin>
                            <li data-uk-filter-control="filter: [data-tags*='light']; group: data-color">
                                <a href="#">Light</a>
                            </li>
                            <li data-uk-filter-control="filter: [data-tags*='dark']; group: data-color">
                                <a href="#">Dark</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="uk-subnav uk-subnav-pill" data-uk-margin>
                            <li data-uk-filter-control="filter: [data-tags*='users']; group: size">
                                <a href="#">Users</a>
                            </li>
                            <li data-uk-filter-control="filter: [data-tags*='ecommerce']; group: size">
                                <a href="#">Ecommerce</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul class="p79-components" data-uk-grid="masonry: true">
                    @foreach ($components as $component)
                        <li data-tags="light users" class="uk-width-1-4@l">
                            <div class="uk-card uk-card-primary uk-card-small uk-border-rounded uk-box-shadow-bottom">
                                <div class="uk-card-media-top">
                                    <img src="https://placekitten.com/300/200"
                                         alt="{{$component->name}}">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title">{{$component->name}}</h3>
                                    <div class="uk-flex uk-flex-between">
                                        <a href="#" class="uk-button uk-button-default uk-border-rounded">Info</a>
                                        <div data-uk-lightbox>
                                            <a href="/component/{{$component->id}}"
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
