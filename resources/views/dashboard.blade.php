<x-new-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    @php
        if (session('musics')) {
            $musics = session('musics');
        }
    @endphp

    @include('includes.musics-list', ['musics' => $musics])

    @include('scripts.music-player', ['musics' => $musics]);
</x-new-layout>
