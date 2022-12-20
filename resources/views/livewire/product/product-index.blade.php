<div>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Books') }}
        </h2>
    @endsection

    @section('content')
        <livewire:product.product.list-product />
    @endsection

    @section('footer')
        <x-layouts.footer />
    @endsection
</div>
