<div class="mb-3">
    <div class="row">
        <div class="col-4">
            <label class="form-label">
                Please select a dish
                <span class="text-danger">(*)</span>
            </label>
            <select
                class="form-select"
                name="names[]"
            >
                @foreach($dishes as $dish)
                    <option
                        value="{{ $dish }}"
                        @if ($stepThree && data_get($stepThree['names'], $index) && $stepThree['names'][$index] == $dish) selected @endif
                    >
                        {{ $dish }}
                    </option>
                @endforeach
            </select>
            @error('names.' . $index)
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-4">
            <label class="form-label">
                Please enter no. of servings
                <span class="text-danger">(*)</span>
            </label>
            <input
                type="number"
                class="form-control"
                name="amount[]"
                value={{ $stepThree && data_get($stepThree['amount'], $index) ? $stepThree['amount'][$index] : 1 }}
                required
            />
            @error('amount.' . $index)
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
