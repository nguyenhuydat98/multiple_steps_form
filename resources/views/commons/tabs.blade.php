@php
    use App\Enums\StatusActiveForm;
    use Illuminate\Support\Facades\Session;
@endphp
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a
            class="nav-link @if($active == StatusActiveForm::ONE) active @endif"
            href={{ route('order.create-step-one') }}
        >
            Step 1
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link @if($active == StatusActiveForm::TWO) active @endif @if(!Session::has('stepOne')) disabled @endif"
            href={{ route('order.create-step-two') }}
        >
            Step 2
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link @if($active == StatusActiveForm::THREE) active @endif @if(!Session::has('stepTwo')) disabled @endif"
            href={{ route('order.create-step-three') }}
        >
            Step 3
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link @if($active == StatusActiveForm::REVIEW) active @endif @if(!Session::has('stepThree')) disabled @endif"
            href={{ route('order.review') }}
        >
            Review
        </a>
    </li>
</ul>
