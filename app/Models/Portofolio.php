<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio';
    protected $primaryKey = 'porto_id';
    protected $fillable = [
        'nama_portofolio',
        'kategori',
        'link',
        'gambar',
    ];

    // 🔥 Accessor untuk embed YouTube
    public function getYoutubeIdAttribute()
    {
        if (!$this->link) return null;

        // Format: youtube.com/watch?v=XXXX
        if (preg_match('/v=([^&]+)/', $this->link, $match)) {
            return $match[1];
        }

        // Format: youtu.be/XXXX
        if (preg_match('/youtu\.be\/([^?]+)/', $this->link, $match)) {
            return $match[1];
        }

        return null;
    }

    public function getYoutubeEmbedUrlAttribute()
    {
        if (!$this->youtube_id) return null;

        return "https://www.youtube.com/embed/{$this->youtube_id}?controls=0&showinfo=0&rel=0&modestbranding=1";
    }
}
