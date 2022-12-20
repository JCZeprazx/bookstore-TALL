<div>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Orders') }}
        </h2>
    @endsection

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="m-4">
                        <livewire:manage-orders.table.user-order />
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('footer')
        <x-layouts.footer />
    @endsection
</div>
