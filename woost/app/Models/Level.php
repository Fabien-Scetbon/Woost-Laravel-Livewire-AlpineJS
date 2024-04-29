<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Level extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // recupere les membres d'un même level
    // public function articles(): BelongsToMany
    // {
    //     return $this->belongsToMany(Publication::class);
    // }
}
