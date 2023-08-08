@extends('layouts.app')

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-light">
            <h2>{{ $component->name }}</h2>
            <h3>HTML</h3>
            <div>{{ $component->html }}</div>
            <h3>Overrides</h3>
            <div>{{ $component->overrides }}</div>
            <h3>SCSS</h3>
            <div>{{ $component->scss }}</div>
        </div>
    </div>
@endsection
