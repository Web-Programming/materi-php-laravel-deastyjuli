<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';

    protected $fillable = [
        'namaMK',
        'materi',
        'dosen',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}