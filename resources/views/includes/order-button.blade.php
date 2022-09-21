@php $class = 'inline-block uppercase rounded bg-main-green-dark font-bold text-[#fff] px-6 py-1 my-4' @endphp
@if ($isFeatured === 1)
    <a href="https://old.solomonsofia.com/bg/formlazer"
       class="{{$class}}">
        ПОРЪЧАЙ
    </a>
@else
    <button class="{{$class}}">
        ПОРЪЧАЙ
    </button>
@endif
