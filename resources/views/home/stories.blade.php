@extends('layout.master')
@section('title'){{ trans_json('pages.stories.title') }}@endsection
@section('description'){{ trans_json('pages.stories.description') }}@endsection
@section('keywords')Stories, BUV@endsection
@section('news_keywords')Stories, BUV@endsection
@section('og-title'){{ trans_json('pages.stories.title') }}@endsection
@section('og-description'){{ trans_json('pages.stories.description') }}@endsection
@section('OgUrl'){{ request()->url() }}@endsection
@section('OgImage'){{ asset('images/logo.png') }}@endsection
@section('content')
    <div class="section__flax--text">
        <div class="container">
            <h1>{{ trans_json('header.stories') }}</h1>
            <p>{{ trans_json('pages.stories.description') }}</p>
        </div>
    </div>
@endsection
