<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $table = 'musics';
    protected $fillable = [
        'title',
        'artist',
        'album',
        'year',
        'genre',
        'notation',
        'image',
    ];

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }
}
