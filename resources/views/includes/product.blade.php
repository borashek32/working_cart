
<div class="m-20">
    <div class="text-center text-bold mb-10 mt-10">
        <p class="text-3xl">
            <a href="{{ route('product', $product->id) }}">
                Product: {{ $product->name }}
            </a>
        </p>
    </div>

    <div class="border border-gray-600 bg-gray-300 p-6 mb-6 text-center">
        <p>{{ $product->description }}</p>
        <p>${{ number_format($product->price, 2) }}</p>

        <form action="{{ route('cart.store', $product->id) }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">

            <button type="submit" class="underline">Add to the cart</button>
        </form>
    </div>
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

