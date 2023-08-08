@extends('layouts.components')

@section('id'){{ $component->id }}@endsection

@section('content')
    <div class="uk-background-default uk-inline uk-width-1-1" data-uk-height-viewport>
        <div class="uk-position-center">
            {!! $component->html !!}
        </div>
    </div>
@endsection
