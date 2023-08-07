@extends('layouts.components')

@section('id'){{ $component->id }}@endsection

@section('content')
    <div class="uk-background-default" style="background-color:#fff;height: 100vh">
        {!! $component->html !!}
    </div>
@endsection
