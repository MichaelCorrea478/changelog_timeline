<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangelogImage extends Model
{
    use HasFactory;

    protected $table = 'changelog_images';

    protected $fillable = [
        'changelog_id', 'image'
    ];

    function changelog()
    {
        return $this->belongsTo(Changelog::class);
    }
}
