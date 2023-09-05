<x-new-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach ($musics as $music)
            <ul role="list" class="divide-y divide-gray-100 p-6">
                <li class="flex justify-between gap-x-6 py-5 bg-white rounded cursor-pointer">
                    <div class="flex min-w-0 gap-x-4 p-6">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                            src="{{ Storage::disk('s3')->url($music->image) }}"
                            alt="">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900"> {{$music->title}} </p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500"> {{$music->album}} </p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end p-6">
                        <p class="text-sm leading-6 text-gray-900"> {{$music->artist}} </p>
                        <p class="mt-1 text-xs leading-5 text-gray-500">Duration <time datetime="2023-01-23T13:23Z">3h
                                ago</time></p>
                    </div>
                </li>
            </ul>
        @endforeach
    </div>
</x-new-layout>
