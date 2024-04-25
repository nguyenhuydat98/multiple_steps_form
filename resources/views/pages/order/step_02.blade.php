@extends('commons.layout')

@section('content')
    <form method="POST" action={{ route('order.store-step-two') }}>
        @csrf
        <div class="mb-3">
            <label class="form-label">
                Please select a restaurant
                <span class="text-danger">(*)</span>
            </label>
            <select
                class="form-select"
                id="restaurant"
                name="restaurant"
            >
                @foreach($restaurants as $restaurant)
                    <option
                        value="{{ $restaurant }}"
                        @if ($stepTwo && $stepTwo['restaurant'] === $restaurant) selected @endif
                    >
                        {{ $restaurant }}
                    </option>
                @endforeach
            </select>
            @error('restaurant')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <a class="btn btn-warning" href={{ route('order.create-step-one') }}>Previous</a>
            <button type="submit" class="btn btn-primary">Next</button>
        </div>
    </form>
@endsection

@section('styles')
@endsection

@section('script')
@endsection
