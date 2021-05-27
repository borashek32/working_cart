@if(Cart::count() > 0)
    <h2 class="mb-2">{{ Cart::count() }} product(s) in your shopping cart</h2>

    <p class="mb-2">Subtotal: ${{ Cart::subtotal() }}</p>

    <p class="mb-2">Including tax (13%): ${{ Cart::tax() }}</p>

    <p class="mb-2">Total: ${{ Cart::total() }}</p>

    <div class="mb-6">
        <a class="underline" href="{{ route('products') }}">Back</a>
    </div>

    <table class="table-fixed w-2/4">
        <thead>
        <tr class="bg-gray-100">
            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">№</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Title</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Quantity</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Price<br>*of one product</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach(Cart::content() as $item)
            <tr>
                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                    <a href="{{ route('product', $item->model->id) }}">
                        {{ $item->model->name }}
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                    <select type="number" class="quantity outline-none focus:outline-none text-center w-20 bg-white
                            font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default
                            flex items-center text-gray-700  outline-none" name="quantity" data-id="{{ $item->rowId }}">
                        @for ($i = 1; $i < 5 + 1 ; $i++)
                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                    ${{ number_format($item->model->price, 2) }}
                </td>
                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                    <div class="">
                        <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                            @csrf
                            <input type="submit" value="Save for later" class="bg-blue-500 hover:bg-blue-700
                                            text-white font-bold py-2 px-4 rounded">
                        </form>

                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Remove" class="bg-red-500 hover:bg-red-700
                                            text-white mt-2 font-bold py-2 px-4 rounded">
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="m-10">
        <a href="{{ route('shipment') }}" class="bg-green-500 hover:bg-green-700
                   text-white font-bold py-2 px-4 rounded">
            Shipping
        </a>
    </div>
@else
    <h2>No products in your cart</h2>

    <a class="underline" href="{{ route('products') }}">Back</a>
@endif
