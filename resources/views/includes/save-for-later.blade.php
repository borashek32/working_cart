@if(Cart::instance('saveForLater')->count() > 0)
    <h2 class="mb-2">{{ Cart::instance('saveForLater')->count() }} product(s) saved for later</h2>

    <div class="mt-20">
        <h2 class="mb-2">Save for later</h2>

        <table class="table-fixed w-2/4">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">№</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Title</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Price</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach(Cart::instance('saveForLater')->content() as $item)
                <tr>
                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                        <a href="{{ route('product', $item->model->id) }}">
                            {{ $item->model->name }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                        ${{ number_format($item->model->price, 2) }}
                    </td>
                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                        <div class="">
                            <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                @csrf
                                <input type="submit" value="Move to cart" class="bg-blue-500 hover:bg-blue-700
                                            text-white font-bold py-2 px-4 rounded">
                            </form>

                            <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Remove" class="bg-red-500 hover:bg-red-700
                                            text-white font-bold py-2 mt-2 px-4 rounded">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <h2>No products saved for later</h2>

    <a class="underline" href="{{ route('products') }}">Back</a>
@endif
