<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $pathData = database_path('seeders/data/dishes.json');
        $dishes = data_get(getData($pathData), 'dishes');
        $restaurants = $this->getRestaurants($dishes);
        $this->makeJsonData('restaurants', $restaurants);
        $mealCategories = $this->getMealCategories($dishes);
        $this->makeJsonData('meal_categories', $mealCategories);
    }

    private function makeJsonData($fileName, $data): void
    {
        $path = database_path("seeders/data/{$fileName}.json");
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($path, $jsonData);
    }

    private function getRestaurants(array $data): array
    {
        $restaurants = [];

        foreach ($data as $item) {
            if (!in_array($item['restaurant'], $restaurants)) {
                $restaurants[] = $item['restaurant'];
            }
        }

        return $restaurants;
    }

    public function getMealCategories(array $data): array
    {
        $mealCategories = [];

        foreach ($data as $item) {
            $categories = $item['availableMeals'];
            $mealCategories = array_unique(array_merge($mealCategories, $categories));
        }

        return $mealCategories;
    }
}
