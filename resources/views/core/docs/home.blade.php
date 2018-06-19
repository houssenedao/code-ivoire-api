@extends('layouts.app')

@section('title', 'API Documentation')

@section('content')
    <nav>

    </nav>
    <main>
        <aside class="sidebar">
            {!! $index !!}
        </aside>

        <article>
            {!! $content !!}
        </article>
    </main>
@endsection
