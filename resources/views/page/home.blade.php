@extends('layouts.frontPage')
@section('title')
    Home
@endsection
@section('content')
@parent
<main class="container py-5">
    <x-partials.system-messages-printer />
    <h1>Link Shortener</h1>
    <p>you can short your links with me !!!</p>
    <hr class="my-5">
</main>
@endsection
