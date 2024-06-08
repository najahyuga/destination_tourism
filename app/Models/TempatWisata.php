<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatWisata extends Model
{
    use HasFactory;

    protected $table = 'tempat_wisata';
    
    protected $fillable = [
        'name_tw',
        'deskripsi',
        'image_tw',
        'daerah_wisata_id',
        'kategori_id',
    ];

    // Relationship
    public function daerahWisata()
    {
        return $this->belongsTo(DaerahWisata::class, 'daerah_wisata_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
