<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MealCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public $timestamps = true;

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class);
    }
}
