<?php

namespace App\Providers;

use App\Models\Music;
use App\Models\Playlist;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $playlists = Playlist::orderBy('title')->get();
        $musics = Music::with('playlists')->orderBy('title')->orderBy('notation')->get();

        // Share the $playlists variable with all views
        View::share(['playlists' => $playlists, 'musics' => $musics]);
    }
}
