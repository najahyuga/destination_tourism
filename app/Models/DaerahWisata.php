<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaerahWisata extends Model
{
    use HasFactory;

    protected $table = 'daerah_wisata';

    protected $fillable = [
        'name_dw',
    ];

    public function tempatWisata()
    {
        return $this->hasMany(TempatWisata::class, 'daerah_wisata_id');
    }
}
