<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class portofolio extends Model
{
    use HasFactory;

    protected $table = 'Portofolio';
    protected $primaryKey = 'porto_id';
    protected $fillable = [
        'nama_portofolio',
        'kategori',
        'link',
        'gambar',
    ];
}
