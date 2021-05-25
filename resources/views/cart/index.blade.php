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

@endsection
