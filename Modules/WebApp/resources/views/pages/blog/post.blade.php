@extends('webapp::components.layout.main')

@section('pageContent')
    @php
        $blogPost = Statamic\Entries\Entry::query()
            ->where('collection', 'blog')
            ->where('slug', request()->route('slug'))
            ->first();

        if (!$blogPost) {
            abort(404);
        }
    @endphp

    <div>
        <h1 class="text-brand-primary mb-3 mt-2 text-center text-3xl font-semibold tracking-tight dark:text-white lg:text-4xl lg:leading-snug">{{ $blogPost->title }}</h1>
        <div class="mt-3 flex justify-center space-x-3 text-gray-500 ">
            <div class="flex items-center gap-3">
                <div>
                    <div class="flex items-center space-x-2 text-sm">
                        <x-ts-badge color="emerald">
                            <time class="dark:text-gray-400" datetime="{{$blogPost->date}}">
                                {{$blogPost->date->format('F d, Y')}}
                            </time>
                        </x-ts-badge>
                        <span>
                                 <x-ts-badge>
                                    @antlers
                                        {{ blogPost = $blogPost }}
                                            <p>{{ main_content | read_time(180) }} min</p>
                                        {{ /blogPost }}
                                    @endantlers
                                 </x-ts-badge>
                            </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative z-0 mx-auto aspect-video max-w-screen-md overflow-hidden lg:rounded-lg my-8">
            <img alt="Thumbnail" loading="eager" decoding="async" data-nimg="fill" class="object-cover" sizes="100vw" src="{{ $blogPost['hero_image'] }}" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
        </div>
    </div>

    <div class="prose max-w-none mx-auto">
        @antlers
        {{ blogPost = $blogPost }}
        {{ main_content }}
        {{ if $type == "text" }}
        {{ $text }}
        {{ elseif $type == "torchlight" }}
        {{code_block}}
        {{ torchlight :language="mode" }}
        {{ code | noparse | entities }}
        {{ /torchlight }}
        {{/code_block}}
        {{ elseif $type == "image" }}
        <figure>
            <img src="{{ $image }}" alt="{{ $caption }}"/>
            <figcaption>{{ $caption }}</figcaption>
        </figure>
        {{ /if }}
        {{ /main_content }}
        {{/blogPost}}
        @endantlers
    </div>
@endsection
