<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Books') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="m-4">
                    <livewire:books.book-form />
                    <livewire:books.book-table />
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="m-4 sm:flex">
                    <div class="w-1/2">
                        <livewire:books.publisher.book-publisher />
                        <livewire:books.publisher.book-publisher-table />
                    </div>
                    <div class="w-1/2">
                        <livewire:books.author.book-author />
                        <livewire:books.author.book-author-table />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
