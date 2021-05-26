@extends('layouts.site')

@section('title', 'Cart')

@section('content')
    <div class="m-40">
        <div class="text-center text-bold mb-10 mt-10">
            <p class="text-3xl">Cart</p>
        </div>

        @include('includes.messages')

        @include('includes.products-in-cart')

        @include('includes.save-for-later')

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        (function () {
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function () {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                        .then(function (response) {
                            // console.log(response);
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function (error) {
                            // console.log(error);
                            window.location.href = '{{ route('cart.index') }}'
                        });
                })
            })
        })();
    </script>
@endsection
