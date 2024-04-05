<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TagArticle extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    // recupere les articles d'un même tag
    // public function articles(): BelongsToMany
    // {
    //     return $this->belongsToMany(Article::class);
    // }
}
