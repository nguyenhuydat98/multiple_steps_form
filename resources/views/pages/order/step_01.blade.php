@extends('commons.layout')

@section('content')
    <form method="POST" action={{ route('order.store-step-one') }}>
        @csrf
        <div class="mb-3">
            <label class="form-label">
                Please select a meal
                <span class="text-danger">(*)</span>
            </label>
            <select
                class="form-select"
                id="meal_category"
                name="meal_category"
            >
                @foreach($mealCategories as $category)
                    <option
                        value={{ $category }}
                        @if ($stepOne && $stepOne['meal_category'] === $category) selected @endif
                    >
                        {{ $category }}
                    </option>
                @endforeach
            </select>
            @error('meal_category')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">
                Please enter number of people
                <span class="text-danger">(*)</span>
            </label>
            <input
                type="number"
                class="form-control"
                id="number_of_people"
                name="number_of_people"
                value={{ $stepOne ? $stepOne['number_of_people'] : 1 }}
            />
            @error('number_of_people')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Next</button>
        </div>
    </form>
@endsection

@section('styles')
@endsection

@section('script')
@endsection
