<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'meal_category_id',
        'number_of_people',
    ];

    public $timestamps = true;

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function mealCategory(): BelongsTo
    {
        return $this->belongsTo(MealCategory::class);
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class)->withPivot('amount');
    }
}
