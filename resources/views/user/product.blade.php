<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Shop') }}
                </h2>
            </div>
        </header>
        <main>
            <div class="md:grid md:grid-cols-5">
                <div class="md:grid md:col-span-4 md:grid-cols-3 md:gap-4 my-5 py-5 mx-auto">
                   <livewire:user.product.list-product />
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
