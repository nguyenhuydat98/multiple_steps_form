<?php

namespace App\Http\Controllers;

use App\Enums\StatusActiveForm;
use App\Http\Requests\Order\StepOneRequest;
use App\Http\Requests\Order\StepThreeRequest;
use App\Http\Requests\Order\StepTwoRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function createStepOne(): View
    {
        $stepOne = Session::has('stepOne') ? Session::get('stepOne') : null;
        $mealCategories = getData(database_path('seeders/data/meal_categories.json'));

        return view('pages.order.step_01')->with([
            'active' => StatusActiveForm::ONE,
            'stepOne' => $stepOne,
            'mealCategories' => $mealCategories,
        ]);
    }

    public function storeStepOne(StepOneRequest $request): RedirectResponse
    {
        Session::put('stepOne', $request->only([
            'meal_category',
            'number_of_people',
        ]));

        return redirect()->route('order.create-step-two');
    }

    public function createStepTwo(): View
    {
        $stepTwo = Session::has('stepTwo') ? Session::get('stepTwo') : null;
        $restaurants = getData(database_path('seeders/data/restaurants.json'));

        return view('pages.order.step_02')->with([
            'active' => StatusActiveForm::TWO,
            'stepTwo' => $stepTwo,
            'restaurants' => $restaurants,
        ]);
    }

    public function storeStepTwo(StepTwoRequest $request): RedirectResponse
    {
        Session::put('stepTwo', $request->only([
            'restaurant',
        ]));

        return redirect()->route('order.create-step-three');
    }

    public function createStepThree(): View
    {
        $numberOfDish = Session::has('numberOfDish') ? Session::get('numberOfDish') : 1;
        $stepThree = Session::has('stepThree') ? Session::get('stepThree') : null;
        $stepTwo = Session::get('stepTwo');
        $dishes = $this->getDishesByRestaurant($stepTwo['restaurant']);

        return view('pages.order.step_03')->with([
            'active' => StatusActiveForm::THREE,
            'stepThree' => $stepThree,
            'numberOfDish' => $numberOfDish,
            'dishes' => $dishes,
        ]);
    }

    public function storeStepThree(StepThreeRequest $request): RedirectResponse
    {
        if (!Session::has('numberOfDish')) {
            Session::put('numberOfDish', 1);
        }

        Session::put('stepThree', $request->only([
            'names',
            'amount',
        ]));

        return redirect()->route('order.review');
    }

    public function review(): View
    {
        $stepOne = Session::get('stepOne');
        $stepTwo = Session::get('stepTwo');
        $stepThree = Session::get('stepThree');
        $order = [
            'meal_category' => $stepOne['meal_category'],
            'number_of_people' => $stepOne['number_of_people'],
            'restaurant' => $stepTwo['restaurant'],
            'number_of_dish' => Session::get('numberOfDish'),
            'names' => $stepThree['names'],
            'amount' => $stepThree['amount'],
        ];

        return view('pages.order.review')->with([
            'active' => StatusActiveForm::REVIEW,
            'order' => $order,
        ]);
    }

    public function createItemDish(): View
    {
        $numberOfDish = Session::has('numberOfDish') ? Session::get('numberOfDish') : 1;
        Session::put('numberOfDish', $numberOfDish + 1);
        $stepThree = Session::has('stepThree') ? Session::get('stepThree') : null;
        $stepTwo = Session::get('stepTwo');
        $dishes = $this->getDishesByRestaurant($stepTwo['restaurant']);

        return view('components.dish')->with([
            'stepThree' => $stepThree,
            'dishes' => $dishes,
            'index' => $numberOfDish,
        ]);
    }

    public function reset(): RedirectResponse
    {
        Session::flush();

        return redirect()->route('order.create-step-one');
    }

    private function getDishesByRestaurant(string $restaurant): array
    {
        $response = [];
        $dishes = data_get(getData(database_path('seeders/data/dishes.json')), 'dishes');

        foreach ($dishes as $dish) {
            if ($dish['restaurant'] === $restaurant && !in_array($dish['name'], $response)) {
                $response[] = $dish['name'];
            }
        }

        return $response;
    }
}
