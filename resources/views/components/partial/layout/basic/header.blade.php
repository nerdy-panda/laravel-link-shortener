@section('doctype')
<!doctype html>
@show
<html {!! $htmlAttributes?->toHtml() !!}>
<head>
    <x-partial.layout.basic.header.meta-tags />
    <x-partial.layout.basic.header.css />
    <x-partial.layout.basic.header.javascript />

    <title>@section('title') @show</title>
</head>
