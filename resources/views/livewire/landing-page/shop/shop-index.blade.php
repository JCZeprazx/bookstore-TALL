<div>
    @section('content')
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Shop') }}
                </h2>
            </div>
        </header>

        <livewire:landing-page.shop.list-product-index />

    </div>
    @endsection

    @section('footer')
        <x-layouts.footer/>
    @endsection
</div>
