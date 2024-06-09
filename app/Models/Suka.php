<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suka extends Model
{
    use HasFactory;

    protected $table = 'suka';

    protected $fillable = [
        'tempat_wisata_id',
        'name_user',
    ];

    public function tempatWisata()
    {
        return $this->belongsTo(TempatWisata::class, 'tempat_wisata_id');
    }
}
