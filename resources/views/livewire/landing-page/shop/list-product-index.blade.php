<div class="grid grid-cols-6 md:gap-5 m-5 py-5">
    @foreach ($books as $book)
        <div class="w-full mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ route('shop/', Str::slug($book->book_name)) }}">
                <img class=" rounded-t-lg" src="{{ asset('storage/' . $book->book_cover) }}" alt="product image" />
            </a>
            <div class="px-3 pb-5">
                <a href="{{ route('shop/', Str::slug($book->book_name)) }}">
                    <h5 class="py-3 text-lg text-center font-semibold tracking-tight text-gray-900 dark:text-white">{{ $book->book_name }}
                    </h5>
                </a>
                <br>
                <div class="w-100% flex items-center justify-between">
                    <span class="text-lg font-bold text-gray-900 dark:text-white">Rp {{ $book->book_cost }}</span>
                    <a href="{{ route('shop/', Str::slug($book->book_name)) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Details</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
