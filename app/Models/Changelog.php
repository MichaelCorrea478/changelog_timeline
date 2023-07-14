<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Changelog extends Model
{
    use HasFactory;

    protected $table = 'changelogs';

    protected $fillable = [
        'title', 'description', 'release_date'
    ];

    protected $casts = [
        'release_date' => 'datetime'
    ];

    function images()
    {
        return $this->hasMany(ChangelogImage::class);
    }
}
