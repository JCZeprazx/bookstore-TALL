<div>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    @endsection

    @section('content')
        <livewire:orders.order.list-order />
    @endsection

    @section('footer')
        <x-layouts.footer />
    @endsection
</div>
