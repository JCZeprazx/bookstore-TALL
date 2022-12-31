<div>
    @section('page-title')
        dynamic title here
    @endsection
    @section('content')
        <div class="min-h-screen bg-gray-100">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Home') }}
                    </h2>
                </div>
            </header>

            <section class="bg-white-500 dark:bg-gray-900">
                <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                    <div class="place-self-center lg:col-span-12 text-center">
                        <h1
                            class="max-w-3xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                            Welcome to NF Book Store</h1>
                        <p class="max-w-3xl my-6 font-light text-gray-500 lg:mb-4 md:text-lg lg:text-xl dark:text-gray-400">
                            NF Store is the the best place to find book some popular books. We offer you a wide selection of
                            books. We have a large collection of new and used books. We have new books in excellent
                            condition as
                            well as used books in good condition.</p>
                    </div>
                </div>
            </section>

            <!-- Content Section -->
            <section class="bg-white dark:bg-gray-900">
                <div class="py-6 px-4 mx-auto max-w-screen-xl sm:py-8 lg:px-6 flex items-center justify-between">
                    <div class="max-w-screen-sm">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white ">The Latest
                            Book
                            Updates</h2>
                        <p class="mb-8 font-light text-gray-500 sm:text-xl dark:text-gray-400 ">We have a wide selection of
                            books that you can choose from. We have new books in excellent condition as well as used books
                            in
                            good condition. Our prices are very reasonable and we offer discounts on bulk purchases</p>
                    </div>
                    <div class="hidden sm:flex p-9">
                        <img src="{{ asset('img/book2.png') }}" alt="">
                    </div>
                </div>
                <div class="py-6 px-4 mx-auto max-w-screen-xl sm:py-8 lg:px-6 flex items-center justify-between">
                    <div class="hidden sm:flex p-9">
                        <img src="{{ asset('img/book5.png') }}" alt="">
                    </div>
                    <div class="max-w-screen-sm">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Various Kinds
                            of
                            Genres </h2>
                        <p class="mb-8 font-light text-gray-500 sm:text-xl dark:text-gray-400">The NF Store has a vast
                            selection
                            of books from all different genres including fiction, nonfiction even manga and comic. </p>
                    </div>

                </div>
            </section>

            <!-- Kelebihan section -->
            <section class="bg-gray-100 dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                    <div class="max-w-screen-md mb-8 lg:mb-16">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white ">NF Store
                            Features
                        </h2>
                        <p class="text-gray-500 sm:text-xl dark:text-gray-400">Here are the features offered by NF Store</p>
                    </div>
                    <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                        <div>
                            <div
                                class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 640 512">
                                    <path
                                        d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48zm368-48c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48z" />
                                </svg>
                            </div>
                            <h3 class="mb-2 text-xl font-bold dark:text-white">Fast delivery</h3>
                            <!-- <p class="text-gray-500 dark:text-gray-400">Plan it, create it, launch it. Collaborate seamlessly with all  the organization and hit your marketing goals every month with our marketing plan.</p> -->
                        </div>
                        <div>
                            <div
                                class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 448 512">
                                    <path
                                        d="M438.6 150.6c12.5-12.5 12.5-32.8 0-45.3l-96-96c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.7 96 32 96C14.3 96 0 110.3 0 128s14.3 32 32 32l306.7 0-41.4 41.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l96-96zm-333.3 352c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 416 416 416c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0 41.4-41.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3l96 96z" />
                                </svg>
                            </div>
                            <h3 class="mb-2 text-xl font-bold dark:text-white">Clear Transaction</h3>
                            <!-- <p class="text-gray-500 dark:text-gray-400">Protect your organization, devices and stay compliant with our structured workflows and custom permissions made for you.</p> -->
                        </div>
                        <div>
                            <div
                                class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 448 512">
                                    <path
                                        d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                </svg>
                            </div>
                            <h3 class="mb-2 text-xl font-bold dark:text-white">Customer Services</h3>
                            <!-- <p class="text-gray-500 dark:text-gray-400">Auto-assign tasks, send Slack messages, and much more. Now power up with hundreds of new templates to help you get started.</p> -->
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white dark:bg-gray-900">
                <div class="grid grid-cols-6 md:gap-5 m-5 py-5">
                    @foreach ($list_product as $product)
                        <div
                            class="w-3/4 mx-auto col-span-2 bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('product/', Str::slug($product->book_name)) }}">
                                <img class=" rounded-t-lg" src="{{ asset('storage/' . $product->book_cover) }}"
                                    alt="product image" />
                            </a>
                            <div class="px-3 pb-5">
                                <a href="{{ route('product/', Str::slug($product->book_name)) }}">
                                    <h5
                                        class="py-3 text-lg text-center font-semibold tracking-tight text-gray-900 dark:text-white">
                                        {{ $product->book_name }}
                                    </h5>
                                </a>
                                <br>
                                <div class="w-100% flex items-center justify-between">
                                    <span class="text-lg font-bold text-gray-900 dark:text-white">Rp
                                        {{ $product->book_cost }}</span>
                                    <a href="{{ route('product/', Str::slug($product->book_name)) }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    @endsection

    @section('footer')
        <x-layouts.footer />
    @endsection
</div>
