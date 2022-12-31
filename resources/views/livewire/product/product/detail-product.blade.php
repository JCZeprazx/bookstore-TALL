<div>
    @section('header')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __($book_name) }}
        </h2>
    @endsection

    @section('content')
        @foreach ($books as $book)
            <div class="relative max-w-screen-xl px-4 py-8 mx-auto">
                <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-2">
                    <!-- Foto Produk mulai -->
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-1">
                        <img alt="Les Paul" src="{{ asset('storage/' . $book->book_cover) }}"
                            class="object-cover w-full rounded-xl" />
                    </div>
                    <!-- Foto produk akhir -->

                    <!-- Detail Produk Mulai -->
                    <div class="sticky top-0">
                        @foreach ($book->category as $category)
                            <strong
                                class="rounded-full border border-blue-600 bg-gray-100 px-3 py-0.5 text-xs font-medium tracking-wide text-blue-600">
                                {{ $category->category_name }}
                            </strong>
                        @endforeach

                        <div class="flex justify-between mt-8">
                            <div class="max-w-[35ch]">
                                <h1 class="text-2xl font-bold">
                                    {{ $book->book_name }}
                                </h1>
                                @foreach ($book->author as $author)
                                    <p class="mt-0.5 text-sm">
                                        {{ $author->author_name }}</p>
                                @endforeach
                            </div>

                            <p class="text-lg font-bold">{{ $book->book_cost }}</p>
                        </div>

                        <details class="relative mt-4 group">
                            <summary class="block">
                                <div>
                                    <div class="prose max-w-none group-open:hidden">
                                        <p class="text-justify">
                                            {{ Str::limit($book->book_description, 300) }}
                                        </p>
                                    </div>

                                    <span
                                        class="mt-4 text-sm font-medium underline cursor-pointer group-open:absolute group-open:bottom-0 group-open:left-0 group-open:mt-0">
                                        Read More
                                    </span>
                                </div>
                            </summary>

                            <div class="pb-6 prose max-w-none">
                                <p class="text-justify">
                                    {!! nl2br(e($book->book_description)) !!}
                                </p>
                            </div>
                        </details>
                        <div class="flex mt-3">
                            <div class="flex flex-col items-start mr-10 justify-evenly">
                                <fieldset>
                                    <legend class="mb-1 text-sm font-bold">Judul Buku</legend>

                                    <div class="flow-root">
                                        <div class="-m-0.5 flex flex-wrap">

                                            <label for="color_cb" class="cursor-pointer p-0.5">
                                                <input type="radio" name="color" id="color_cb" class="sr-only peer" />

                                                <span
                                                    class="inline-block py-1 text-sm font-medium group peer-checked:bg-black peer-checked:text-white">
                                                    {{ $book->book_name }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <legend class="mb-1 text-sm font-bold">Jumlah Halaman</legend>

                                    <div class="flow-root">
                                        <div class="-m-0.5 flex flex-wrap">

                                            <label for="color_cb" class="cursor-pointer p-0.5">
                                                <input type="radio" name="color" id="color_cb" class="sr-only peer" />

                                                <span
                                                    class="inline-block py-1 text-sm font-medium group peer-checked:bg-black peer-checked:text-white">
                                                    {{ $book->total_page }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <legend class="mb-1 text-sm font-bold">Bahasa</legend>

                                    <div class="flow-root">
                                        <div class="-m-0.5 flex flex-wrap">

                                            <label for="color_cb" class="cursor-pointer p-0.5">
                                                <input type="radio" name="color" id="color_cb" class="sr-only peer" />

                                                <span
                                                    class="inline-block py-1 text-sm font-medium group peer-checked:bg-black peer-checked:text-white">
                                                    {{ $book->language->language }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                            </div>
                            <br>
                            <div class="flex flex-col items-start justify-evenly">
                                <fieldset>
                                    <legend class="mb-1 text-sm font-bold">ISBN</legend>

                                    <div class="flow-root">
                                        <div class="-m-0.5 flex flex-wrap">

                                            <label for="color_cb" class="cursor-pointer p-0.5">
                                                <input type="radio" name="color" id="color_cb" class="sr-only peer" />

                                                <span
                                                    class="inline-block py-1 text-sm font-medium group peer-checked:bg-black peer-checked:text-white">
                                                    {{ $book->isbn }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>

                                <br>
                                <fieldset>
                                    <legend class="mb-1 text-sm font-bold">Tanggal Terbit</legend>

                                    <div class="flow-root">
                                        <div class="-m-0.5 flex flex-wrap">

                                            <label for="color_cb" class="cursor-pointer p-0.5">
                                                <input type="radio" name="color" id="color_cb" class="sr-only peer" />

                                                <span
                                                    class="inline-block py-1 text-sm font-medium group peer-checked:bg-black peer-checked:text-white">
                                                    {{ $book->release_date }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <legend class="mb-1 text-sm font-bold">Penerbit</legend>

                                    <div class="flow-root">
                                        <div class="-m-0.5 flex flex-wrap">

                                            <label for="color_cb" class="cursor-pointer p-0.5">
                                                <input type="radio" name="color" id="color_cb" class="sr-only peer" />

                                                <span
                                                    class="inline-block py-1 text-sm font-medium group peer-checked:bg-black peer-checked:text-white">
                                                    {{ $book->publisher->publisher_name }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="flex mt-8">
                            <livewire:product.components.book-order :book_id='$book->id' />
                        </div>
                    </div>
                </div>
        @endforeach
    @endsection

    @section('footer')
        <x-layouts.footer />
    @endsection
</div>
