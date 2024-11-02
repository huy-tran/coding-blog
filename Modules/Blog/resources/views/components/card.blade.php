<div class="cursor-pointer group">
    <div class="overflow-hidden rounded-md bg-gray-100 transition-all hover:scale-105 dark:bg-gray-800">
        <a class="relative block aspect-square" href="{{ route('website.pages.blogs.post', ['slug' => $entry->slug]) }}">
            <img
                alt="Thumbnail" loading="lazy" decoding="async" data-nimg="fill" class="object-cover transition-all"
                style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"
                sizes="(max-width: 768px) 30vw, 33vw" srcset="" src="{{$entry->hero_image}}"
            >
        </a>
    </div>
    <div class="">
        <div>
            <h2 class="mt-2 text-lg font-semibold leading-snug tracking-tight dark:text-white"><a
                    href="{{ route('website.pages.blogs.post', ['slug' => $entry->slug]) }}"
                ><span class="bg-gradient-to-r from-green-200 to-green-100 bg-left-bottom bg-no-repeat duration-500 transition-[background-size] dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">{{$entry->title}}</span></a>
            </h2>
            <div class="mt-3 flex items-center text-gray-500 space-x-3 dark:text-gray-400">
                <time class="truncate text-sm" datetime="{{$entry->date}}">{{$entry->date->format('F d, Y')}}</time>
            </div>
        </div>
    </div>
</div>
