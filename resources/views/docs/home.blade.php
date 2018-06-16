@extends('layouts.app')

@section('title', 'API Documentation')

@section('content')
    <nav>

    </nav>
    <main>
        <section class="sidebar">
            <small><a href="#" id="doc-expand" style="font-size: 11px; color: #B8B8B8;">Expand All</a></small>
            {!! $index !!}
        </section>

        <article>
            {!! $content !!}
        </article>
    </main>
@endsection
