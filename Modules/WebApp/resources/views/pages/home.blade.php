@extends('webapp::components.layout.main')

@section('pageContent')
    @php
        $blogPosts = Statamic\Entries\Entry::query()
            ->where('collection', 'blog')
            ->orderByDesc('date')
            ->paginate(14);
    @endphp

    <div class="grid gap-10 md:grid-cols-3 lg:gap-10 mt-10">
        @foreach($blogPosts as $blogPost)
            <x-bg:blog::card :entry="$blogPost"/>
        @endforeach
    </div>
@endsection
