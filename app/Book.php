<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    //
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'thumbnail',
        'description',
        'comment',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
