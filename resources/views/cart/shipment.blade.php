@extends('layouts.site')

@section('title', 'Shipment')

@section('content')
    <div class="m-40">
        <div class="text-center text-bold mb-10 mt-10">
            <p class="text-3xl">Shipment & billing</p>
        </div>

        @include('includes.messages')

        @include('includes.shipping-form')
    </div>
@endsection
