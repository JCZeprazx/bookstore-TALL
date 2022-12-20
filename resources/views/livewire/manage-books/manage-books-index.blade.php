<div>
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Books') }}
        </h2>
    @endsection

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="m-4">

                        <livewire:manage-books.books.addbooks />
                        <livewire:manage-books.books.tablebooks />

                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="m-4 sm:flex">
                        <div class="w-1/2">

                            <livewire:manage-books.authors.add-authors />
                            <livewire:manage-books.authors.table-authors />

                        </div>
                        <div class="w-1/2">

                            <livewire:manage-books.publishers.add-publishers />
                            <livewire:manage-books.publishers.table-publishers />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('footer')
        <x-layouts.footer />
    @endsection
</div>
