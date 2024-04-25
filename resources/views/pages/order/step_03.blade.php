@extends('commons.layout')

@section('content')
    <form method="POST" action={{ route('order.store-step-three') }}>
        @csrf
        <div id="listDish">
            @for ($index = 0; $index < $numberOfDish; $index++)
                @include('components.dish', ['index' => $index])
            @endfor
        </div>
        <div class="mb-3">
            <span id="addDish" class="btn-add-dish">
                <i class="fa-solid fa-plus"></i>
            </span>
        </div>
        <div class="mb-2">
            @error('totalAmount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="hidden" name="numberOfDish" value={{ $numberOfDish }} />
        <div class="mb-3">
            <a class="btn btn-warning" href={{ route('order.create-step-two') }}>Previous</a>
            <button type="submit" class="btn btn-primary">Next</button>
        </div>
    </form>
@endsection

@section('styles')
<style>
    .btn-add-dish {
        border: 1px solid #dee2e6;
        padding: 2px 5px;
        margin-right: 10px;
    }
    .btn-add-dish:hover {
        cursor: pointer;
    }
</style>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#addDish').click(function() {
            $.ajax({
                url: '{{ route("order.create-item-dish") }}',
                method: 'GET',
                success: function (response) {
                    $('#listDish').append(response);
                },
            });
        });
    });
</script>
@endsection
