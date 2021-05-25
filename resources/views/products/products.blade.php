@extends('layouts.site')

@section('title', 'Products')

@section('content')
    <div class="m-20">
        <div class="text-center text-bold mb-10 mt-10">
            <p class="text-3xl">All products</p>
        </div>

        @foreach($products as $product)
            @include('includes.product')
        @endforeach
    </div>

            <style>
                input[type='number']::-webkit-inner-spin-button,
                input[type='number']::-webkit-outer-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }

                .custom-number-input input:focus {
                    outline: none !important;
                }

                .custom-number-input button:focus {
                    outline: none !important;
                }
            </style>

            <script>
                function decrement(e) {
                    const btn = e.target.parentNode.parentElement.querySelector(
                        'button[data-action="decrement"]'
                    );
                    const target = btn.nextElementSibling;
                    let value = Number(target.value);
                    value--;
                    target.value = value;
                }

                function increment(e) {
                    const btn = e.target.parentNode.parentElement.querySelector(
                        'button[data-action="decrement"]'
                    );
                    const target = btn.nextElementSibling;
                    let value = Number(target.value);
                    value++;
                    target.value = value;
                }

                const decrementButtons = document.querySelectorAll(
                    `button[data-action="decrement"]`
                );

                const incrementButtons = document.querySelectorAll(
                    `button[data-action="increment"]`
                );

                decrementButtons.forEach(btn => {
                    btn.addEventListener("click", decrement);
                });

                incrementButtons.forEach(btn => {
                    btn.addEventListener("click", increment);
                });
            </script>
@endsection

