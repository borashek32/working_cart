<form id="form" action="{{ route('orders.store') }}" method="POST" class="w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mt-4">
    @csrf
    <br>
    <h1 class="block text-gray-700 font-bold mb-2 text-xl text-center">
        Shipping address
    </h1>

    <h3>Please, fill in your shipping information</h3>

    <p class="text-xs">*For now we can offer pickup or a delivery through transport company.<br>
        Call our manager
        <a href="tel:+79999999999" class="textAddress">
            +7 999 9999999
        </a>
        to discuss the details
    </p>

    <br>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_fullname">
            Full name
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="shipping_fullname" id="shipping_fullname" type="text" placeholder="Enter your full name" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_address">
            Address
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="shipping_address" id="shipping_address" type="text" placeholder="Enter shipping address" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_city">
            City
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="shipping_city" id="shipping_city" type="text" placeholder="Enter shipping city" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_postcode">
            Postcode
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="shipping_postcode" id="shipping_postcode" type="text" placeholder="Enter shipping postcode" required>
    </div>

    <div class="mb-4">

        <label class="block text-gray-700 text-sm font-bold mb-2" for="shipping_phone">
            Phone
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="shipping_phone" id="shipping_phone" type="tel" placeholder="Enter your phone" required>
    </div>

    <div class="mb-4">

        <label class="block text-gray-700 text-sm font-bold mb-2" for="notes">
            Notes
        </label>

        <textarea class="bshadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  name="notes" id="notes" type="text" placeholder="Leave your notes here"></textarea>
    </div>

{{--    @include('includes.billing-section')--}}

    @include('includes.payment-methods')

    <div class="flex items-center mt-3 justify-between">
        <button id="submit"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
            Checkout
        </button>
    </div>

    <div class="mb-4"></div>
</form>

@section('scripts')
    <script src="https://kit.fontawesome.com/1e268974cb.js" crossorigin="anonymous"></script>
    <script src="assets/js/helpers.js"></script>
    <script src="assets/js/whatsapp.js"></script>
@endsection
