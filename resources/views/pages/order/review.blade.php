@extends('commons.layout')

@section('content')
    <form method="POST" action="#">
        @csrf
        <div class="row mb-3">
            <div class="col-3">Meal</div>
            <div class="col-9">{{ $order['meal_category'] }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-3">Number of people</div>
            <div class="col-9">{{ $order['number_of_people'] }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-3">Restaurant</div>
            <div class="col-9">{{ $order['restaurant'] }}</div>
        </div><div class="row mb-3">
            <div class="col-3">Dishes</div>
            <div class="col-9">
                @for ($index = 0; $index < $order['number_of_dish']; $index++)
                    <div>{{ $order['names'][$index] }} ~ {{ $order['amount'][$index] }}</div>
                @endfor
            </div>
        </div>

        <div class="mb-3">
            <a class="btn btn-warning" href={{ route('order.create-step-three') }}>Previous</a>
            <div class="btn btn-primary" id="submit">Submit</div>
        </div>
    </form>
@endsection

@section('styles')
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#submit').click(function() {
            let order = {!! json_encode($order) !!};
            console.log(order);
            console.log("Order successfully!");
        });
    });
</script>
@endsection
