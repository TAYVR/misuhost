<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Soung extends Model
{
    use HasFactory;
    protected $fillable = [
        "song",
        "cover",
        "title",
        "user_id",
        "views",
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
    public function favorites():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites');
    }


}
